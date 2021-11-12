<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    /**
     * @Route("/api/register", name="api_register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasherInterface, EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator): Response
    {
        $jsonContent = $request->getContent();
      
        $newUser = $serializer->deserialize($jsonContent, User::class, 'json');
       
        //remove password whitespace
        $newUser->setPassword(trim($newUser->getPassword()));

        // validation des données
        $errors = $validator->validate($newUser);
       
        if(count($errors)) {
            return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY); 
        }
    
        // encode the plain password
        $newUser->setPassword(
        $userPasswordHasherInterface->hashPassword(
                $newUser,
                $newUser->getPassword()
            )
        );

        $entityManager->persist($newUser);
        $entityManager->flush();

        // generate a signed url and email it to the user
        $this->emailVerifier->sendEmailConfirmation('app_verify_email', $newUser,
            (new TemplatedEmail())
                ->from(new Address('avezvousdejalu.pro@gmail.com', 'Avez-vous déjà lu..?'))
                ->to($newUser->getEmail())
                ->subject('Please Confirm your Email')
                ->htmlTemplate('registration/confirmation_email.html.twig')
        );
        // do anything else you need here, like send an email

        // $reponseAsArray = [
        //     'message' => 'Utilisateur enregistré',
        //     'id' => $user->getId()
        // ];

        $jsonResponse = [
            'message' => 'User created',
        ];

        return $this->json($jsonResponse, Response::HTTP_CREATED);
    

        //return $this->json(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @Route("/verify/email", name="app_verify_email")
     */
    public function verifyUserEmail(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('app_login');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('home');
    }
}
