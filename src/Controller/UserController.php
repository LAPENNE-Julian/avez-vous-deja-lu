<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/backoffice/user", name="backoffice_user_")
 * @IsGranted("ROLE_ADMIN")
 */
class UserController extends AbstractController
{
    /**
     * Method which list users.
     * 
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(UserRepository $userRepository): Response
    {
        //transfert informations to the view
        return $this->render('user/browse.html.twig', [
            'user_list' => $userRepository->findAll()
        ]);
    }

    /**
     * Method which read one user.
     * 
     * @Route("/read/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read($id, UserRepository $userRepository): Response
    {
        //transfert informations to the view
        return $this->render('user/read.html.twig', [
            'user' => $userRepository->find($id),
        ]);
    }

    /**
     * Method which edit one user.
     * 
     * @Route("/edit/{id}", name="edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, User $user, UserPasswordHasherInterface $passwordHasher, SluggerInterface $slugger): Response
    {
        //create a form for user edition
        $userForm = $this->createForm(UserType::class, $user);

        //handle listener for user form
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            //if the form is submitted and valid
            //use EntityManager
            $entityManager = $this->getDoctrine()->getManager();

            $user->setUpdatedAt(new DateTimeImmutable());

            $clearPassword = $request->request->get('user')['password'];
            //if password is submitted
            if (! empty($clearPassword))
            {
                //hash password user
                $hashedPassword = $passwordHasher->hashPassword($user, $clearPassword);
                $user->setPassword($hashedPassword);
            }

            //get role submitted in user form
            $roleChoice = $request->request->get('user')['roles'];
            //if role submitted  is Admin
            if($roleChoice[0] == "ROLE_ADMIN"){
                //set roles Admin and User for an Admin
                $user->setRoles(['ROLE_USER','ROLE_ADMIN']);
            }
            
        /** @var UploadedFile $img */
        $avatar = $userForm->get('img')->getData();

        // this condition is needed because the 'img' field is not required
        // so the image file must be processed only when a file is uploaded
        if ($avatar) {
            
            $originalFilename = pathinfo($avatar->getClientOriginalName(), PATHINFO_FILENAME);
            // this is needed to safely include the file name as part of the URL
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$avatar->guessExtension();

            // Move the file to the directory where avatars are stored
            try {
                $avatar->move(
                    $this->getParameter('avatar_directory'),
                    $newFilename
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
                
            }

            //get http host
            $server = $_SERVER['HTTP_HOST'];
            //set the url of the user image
            $userImageUrl = 'http://' . $server . $newFilename;

            // updates the 'img' property to store the image file name
            // instead of its contents
            $user->setImg($userImageUrl);

        } else { 
            //if user img is null, set an image by default
            if($user->getImg() == null){
                //if no image file
                //get the base path url
                $pathDirectory = $this->getParameter('avatar_directory');
                //get http host
                $server = $_SERVER['HTTP_HOST'];
                //set the url of the user image
                $user->setImg('http://' . $server . $pathDirectory . 'default-avatar.png');
            }
        }
            
            //EntityManager edit the user object in database
            $entityManager->flush();

            //post a flash message in the view
            $this->addFlash('success', "The user `{$user->getPseudo()}` is update");

            //redirection after update
            return $this->redirectToRoute('backoffice_user_browse');
        }

        //transfert the form to the view
        return $this->render('user/add.edit.html.twig', [
            'user_form' => $userForm->createView(),
            'user' => $user,
        ]);
    }

    /**
     * Method which add one user.
     * 
     * @Route("/add", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request, UserPasswordHasherInterface $passwordHasher, SluggerInterface $slugger): Response
    {
        $user = new user();

        //create a virgin form (because the object is empty)
        $userForm = $this->createForm(UserType::class, $user);

        //handle listerner for user form
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            //if the form is submitted and valid
            //use EntityManager
            $entityManager = $this->getDoctrine()->getManager();
            
            $clearPassword = $request->request->get('user')['password'];
            //if password is submitted
            if (! empty($clearPassword))
            {
                // hash password user
                $hashedPassword = $passwordHasher->hashPassword($user, $clearPassword);
                $user->setPassword($hashedPassword);
            }

            //get role submitted in user form
            $roleChoice = $request->request->get('user')['roles'];
            //if role submitted  is Admin
            if($roleChoice[0] == "ROLE_ADMIN"){
                //set roles Admin and User for an Admin
                $user->setRoles(['ROLE_USER','ROLE_ADMIN']);
            }

        /** @var UploadedFile $img */
        $avatar = $userForm->get('img')->getData();

        // this condition is needed because the 'img' field is not required
        // so the image file must be processed only when a file is uploaded
        if ($avatar) {
            $originalFilename = pathinfo($avatar->getClientOriginalName(), PATHINFO_FILENAME);
            // this is needed to safely include the file name as part of the URL
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$avatar->guessExtension();

            // Move the file to the directory where avatars are stored
            try {
                $avatar->move(
                    $this->getParameter('avatar_directory'),
                    $newFilename
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
                
            }

            //get http host
            $server = $_SERVER['HTTP_HOST'];
            //set the url of the user image
            $userImageUrl = 'http://' . $server . $newFilename;

            // updates the 'img' property to store the image file name
            // instead of its contents
            $user->setImg($userImageUrl);

        } else {
            //if no image file
            //get the base path url
            $pathDirectory = $this->getParameter('avatar_directory');
            //get http host
            $server = $_SERVER['HTTP_HOST'];
            //set the url of the user image
            $user->setImg('http://' . $server . $pathDirectory . 'default-avatar.png');
        }
            
            //persist the new object user
            $entityManager->persist($user);
            //EntityManager edit the user object in database
            $entityManager->flush();

            //post a flash message in the view
            $this->addFlash('success', "User `{$user->getPseudo()}` created successfully");

            //redirection
            return $this->redirectToRoute('backoffice_user_browse');
        }

        //transfert the form to the view
        return $this->render('user/add.edit.html.twig', [
            'user_form' => $userForm->createView(),
        ]);
    }

    /**
     * Method which delete one user.
     * 
     * @Route("/delete/{id}", name="delete", methods={"GET", "DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(User $user, EntityManagerInterface $entityManager): Response
    {
        //post a flash message in the view
        $this->addFlash('success', "User {$user->getId()} deleted successfully");

        //delete the user
        $entityManager->remove($user);
        //EntityManager delete the user object in database
        $entityManager->flush();

        //redirection after delete
        return $this->redirectToRoute('backoffice_user_browse');
    }
}
