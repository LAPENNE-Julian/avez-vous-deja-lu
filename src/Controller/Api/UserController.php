<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\AnecdoteRepository;
use App\Repository\UserRepository;
use App\Utils\ApiBase64ToImg;
use App\Utils\ApiNavigationAnecdote;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("api/user", name="api_user_")
 * @IsGranted("ROLE_USER")
 */
class UserController extends AbstractController
{
    private $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("", name="read", methods={"GET"})
     */
    public function read(Request $request, SerializerInterface $serializer): Response
    {    
        //get Json content (user email)
        $jsonContent = $request->getContent();
        //replace Json Content to an object
        $userInSession = $serializer->deserialize($jsonContent, User::class, 'json');

        //get email in Json Content
        $email = $userInSession->getEmail();

        //Find user informations by email
        //$user = $this->userRepository->findByEmail($email);
        $user = $this->userRepository->findBy(['email' => $email]);

        //if the user email isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get user image
        $image = $user[0]->getImg();
        //get http host
        $server = $_SERVER['HTTP_HOST'];
        //set the url of the user image
        $url = 'http://' .$server. $image ;

        $responseAsArray = [
            'user' => $user,
            'img_url' => $url,
        ];

        return $this->json($responseAsArray, Response::HTTP_OK, [], ['groups' => 'api_user_read']);
    }

    
    /**
     * @Route("/{userId}/edit", name="edit", methods={"PATCH"}, requirements={"id"="\d+"})
     */
    public function edit(int $userId, Request $request, ValidatorInterface $validator, SerializerInterface $serializer, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);

        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get Json content
        $jsonContent = $request->getContent();
        //deserialize Json content for User entity
        $serializer->deserialize($jsonContent, User::class, 'json',[
            AbstractNormalizer::OBJECT_TO_POPULATE => $user
        ]);

        //remove whitespace in password
        $user->setPassword(trim($user->getPassword()));

        // validation
        $errors = $validator->validate($user);

        //if errors
        if(count($errors) > 0)
        {
            $reponseAsArray = [
                'error' => true,
                'message' => $errors,
            ];

            return $this->json($reponseAsArray, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //EntityManager edit the object in database
        $entityManager->flush();
        
        $reponseAsArray = [
            'message' => 'user update'
        ];

        return $this->json($reponseAsArray, Response::HTTP_CREATED);
    }

    /**
     * @Route("/{userId}/edit/img", name="edit_img", methods={"PATCH"}, requirements={"id"="\d+"})
     */
    public function editImg(int $userId, Request $request, ValidatorInterface $validator, SerializerInterface $serializer, EntityManagerInterface $entityManager, SluggerInterface $slugger, ApiBase64ToImg $apiBase64ToImg): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);

        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get Json content
        $jsonContent = $request->getContent();
        //deserialize Json content for User entity
        $serializer->deserialize($jsonContent, User::class, 'json',[
            AbstractNormalizer::OBJECT_TO_POPULATE => $user
        ]);

        //validation
        $errors = $validator->validate($user);

        //if errors
        if(count($errors) > 0)
        {
            $reponseAsArray = [
                'error' => true,
                'message' => $errors,
            ];

            return $this->json($reponseAsArray, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //get base64 string fot the user avatar
        $my_base64_string = $user->getImg();

        //get the base path url
        $pathDirectory = $this->getParameter('avatar_directory');

        //name the image file
        $fileName = $user->getPseudo();
        // this is needed to safely include the file name as part of the URL
        $safeFilename = $slugger->slug($fileName);
        $newFilename = $pathDirectory . $safeFilename.'-'.uniqid(). '.jpg';

        //Use ApiBase64ToImg Service for convert the base 64 string to img
        $apiBase64ToImg->convertToImg($my_base64_string, $newFilename);

        // updates the 'img' property to store the image file name
        // instead of its contents
        $user->setImg($newFilename);

        //EntityManager edit the object in database
        $entityManager->flush();
        
        $reponseAsArray = [
            'message' => 'user update'
        ];

        return $this->json($reponseAsArray, Response::HTTP_CREATED);
    }

    /**
     * List of favorite anecdotes user.
     * 
     * @Route("/{userId}/favorite", name="favorite_browse", methods={"GET"}, requirements={"userId"="\d+"})
     */
    public function favoriteBrowse(int $userId): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);

        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //find list of favorite anecdotes user
        $userFavorites = $user->getFavorite();

        return $this->json($userFavorites, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Check if the anecdote is a favorite anecdote User.
     * 
     * @Route("/{userId}/favorite/{anecdoteId}/check", name="favorite_check", methods={"GET"}, requirements={"anecdoteId"="\d+", "userId"="\d+"})
     */
    public function favoriteCheck(int $userId, int $anecdoteId, AnecdoteRepository $anecdoteRepository): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);
        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //find anecdote informations by anecdoteId
        $anecdote = $anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist.
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //find list of favorite anecdotes user
        $userFavorites = $user->getFavorite();

        foreach($userFavorites as $anecdote){
            //get anecdote Id in the user favorites list
            $anecdoteIdInUserFavoritesList = $anecdote->getId();

            //Check if the anecdoteId request is in the Id list
            if($anecdoteId == $anecdoteIdInUserFavoritesList){

                $response = [
                    'response' => true,
                    'userMessage' => 'This anecdote is in your favorite',
                ];

                return $this->json($response, Response::HTTP_OK);

            } else {

                $response = [
                    'response' => false,
                    'userMessage' => 'This anecdote isn\'t in your favorite',
                ];

            }

        }

        return $this->json($response, Response::HTTP_OK);
    }

    /**
     * Navigation to next in list of favorite anecdotes.
     * 
     * @Route("/{userId}/favorite/{anecdoteId}/next", name="favorite_next", methods={"GET"}, requirements={"anecdoteId"="\d+", "userId"="\d+"})
     */
    public function favoriteNext(int $userId, int $anecdoteId, ApiNavigationAnecdote $apiNavigationAnecdote): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);

        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all favorite anecdotes for user
        $favoriteAnecdotesList = $user->getFavorite();

        $nextAnecdote = $apiNavigationAnecdote->next($favoriteAnecdotesList, $anecdoteId);

            //if the anecdote id isn't exist in the $favoriteAnecdotesList
            if ($nextAnecdote == false) {

                $reponseAsArray = [
                    'error' => true,
                    'userMessage' => 'Resource not found',
                    'message' => 'this anecdote isn\'t exist in user favorites'
                ];
        
                return $this->json($reponseAsArray, Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            
        return $this->json($nextAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * Navigation to previous in list of favorite anecdotes.
     * 
     * @Route("/{userId}/favorite/{anecdoteId}/prev", name="favorite_previous", methods={"GET"}, requirements={"anecdoteId"="\d+", "userId"="\d+"})
     */
    public function favoritePrev(int $userId, int $anecdoteId, ApiNavigationAnecdote $apiNavigationAnecdote): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);

        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all favorite anecdotes for user
        $favoriteAnecdotesList = $user->getFavorite();

        $previousAnecdote = $apiNavigationAnecdote->previous($favoriteAnecdotesList, $anecdoteId);

            //if the anecdote id isn't exist in the $favoriteAnecdotesList
            if ($previousAnecdote == false) {

                $reponseAsArray = [
                    'error' => true,
                    'userMessage' => 'Resource not found',
                    'message' => 'this anecdote isn\'t exist in user favorites'
                ];
        
                return $this->json($reponseAsArray, Response::HTTP_UNPROCESSABLE_ENTITY);
            }

        return $this->json($previousAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * method which add one favorite
     * 
     * @Route("/{userId}/favorite/{anecdoteId}/add", name="favorite_add", methods={"POST"}, requirements={"anecdoteId"="\d+", "userId"="\d+"})
     */
    public function favoriteAdd(int $userId, int $anecdoteId, AnecdoteRepository $anecdoteRepository, EntityManagerInterface $entityManager): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);
        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //find anecdote informations by anecdoteId
        $newFavoriteAnecdote = $anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist
        if (is_null($newFavoriteAnecdote)) {
            return $this->getNotFoundResponse();
        }

        $user->addFavorite($newFavoriteAnecdote);

        //EntityManager edit the user object in database
        $entityManager->flush($user);

        $reponseAsArray = [
            'message' => 'add favorite'
        ];

        return $this->json($reponseAsArray, Response::HTTP_OK );
    }

    /**
     * method which delete one favorite
     * 
     * @Route("/{userId}/favorite/{anecdoteId}/delete", name="favorite_delete", methods={"DELETE"}, requirements={"anecdoteId"="\d+", "userId"="\d+"})
     */
    public function favoriteDelete(int $userId, int $anecdoteId, AnecdoteRepository $anecdoteRepository, EntityManagerInterface $entityManager): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);
        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }
        //find anecdote informations by anecdoteId
        $anecdote = $anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //Delete the favorite anecdote
        $user->removeFavorite($anecdote);

        //EntityManager edit the user object in database
        $entityManager->flush($user);

        $reponseAsArray = [
            'message' => 'delete favorite'
        ];

        return $this->json($reponseAsArray, Response::HTTP_OK );
    }

    /**
     * Get random anecdotes, and add in random anecdotes user list.
     * 
     * @Route("/{userId}/random", name="random",  methods={"GET","POST"}, requirements={"userId"="\d+"})
     */
    public function random(int $userId, AnecdoteRepository $anecdoteRepository, EntityManagerInterface $entityManager): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);
        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all anecdotes informations
        $allAnecdotes = $anecdoteRepository->findAll();
        //count all anecdotes in database
        $anecdotesIndex = count($allAnecdotes);
        //random in count index
        $randomIndex = rand(1, $anecdotesIndex);

        //get an anecdote random
        $anecdote = $anecdoteRepository->find($randomIndex);

        //if historical random anecdotes have five anecdotes, the user have to delete anecdote
        if(count($user->getRandomAnecdotes()) > 4){

            $responseAsArray = [
                'message' => 'Your random anecdote history is full, please delete anecdotes to get new random in your history',
                'anecdote' => $anecdote,
            ];
            return $this->json($responseAsArray, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);

        }
        //add the random anecdote to the user profil
        $user->addRandomAnecdote($anecdote);

        //EntityManager edit the user object in database
        $entityManager->flush($user);

        return $this->json($anecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * List of random anecdotes in user historical.
     * 
     * @Route("/{userId}/random/anecdote", name="random_browse", methods={"GET"}, requirements={"userId"="\d+"})
     */
    public function randomBrowse(int $userId): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);

        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //find list of favorite anecdotes user
        $randomAnecdotesList = $user->getRandomAnecdotes();

        //if random anecdote historical is empty
        if (count($randomAnecdotesList) == 0) {
            $responseAsArray = [
                'message' => 'you did not draw lots of anecdote',
            ];
            return $this->json($responseAsArray, Response::HTTP_OK);
        }

        return $this->json($randomAnecdotesList, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Get navigation to next anecdote in user random anecdotes historical.
     * 
     * @Route("/{userId}/random/{anecdoteId}/next", name="random_next",  methods={"GET"}, requirements={"anecdoteId"="\d+", "userId"="\d+"})
     * 
     */
    public function randomNext(int $userId, int $anecdoteId, ApiNavigationAnecdote $apiNavigationAnecdote): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);

        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all random anecdotes in user profil
        $randomAnecdotesList = $user->getRandomAnecdotes();

        $nextAnecdote = $apiNavigationAnecdote->next($randomAnecdotesList, $anecdoteId);

            //if the anecdote id isn't exist in the $favoriteAnecdotesList
            if ($nextAnecdote == false) {

                $reponseAsArray = [
                    'error' => true,
                    'userMessage' => 'Resource not found',
                    'message' => 'this anecdote isn\'t exist in user random historical'
                ];
        
                return $this->json($reponseAsArray, Response::HTTP_UNPROCESSABLE_ENTITY);
            }

        return $this->json($nextAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * Get navigation to previous anecdote in user random anecdotes historical.
     * 
     * @Route("/{userId}/random/{anecdoteId}/prev", name="random_previous",  methods={"GET"}, requirements={"anecdoteId"="\d+", "userId"="\d+"})
     */
    public function randomPrevious(int $userId, int $anecdoteId, ApiNavigationAnecdote $apiNavigationAnecdote): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);

        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all random anecdotes in user profil
        $randomAnecdotesList = $user->getRandomAnecdotes();

        $previousAnecdote = $apiNavigationAnecdote->previous($randomAnecdotesList, $anecdoteId);

            //if the anecdote id isn't exist in the $favoriteAnecdotesList
            if ($previousAnecdote == false) {

                $reponseAsArray = [
                    'error' => true,
                    'userMessage' => 'Resource not found',
                    'message' => 'this anecdote isn\'t exist in user random historical'
                ];
        
                return $this->json($reponseAsArray, Response::HTTP_UNPROCESSABLE_ENTITY);
            }

        return $this->json($previousAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * method which delete one random anecdote
     * 
     * @Route("/{userId}/random/{anecdoteId}/delete", name="random_delete", methods={"DELETE"}, requirements={"anecdoteId"="\d+", "userId"="\d+"})
     */
    public function randomDelete(int $userId, int $anecdoteId, AnecdoteRepository $anecdoteRepository, EntityManagerInterface $entityManager): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);
        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }
        //find anecdote informations by anecdoteId
        $anecdote = $anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //Delete the anecdote in random anecdotes historical
        $user->removeRandomAnecdote($anecdote);

        //EntityManager edit the user object in database
        $entityManager->flush($user);

        $reponseAsArray = [
            'message' => 'random anecdote delete in your historical'
        ];

        return $this->json($reponseAsArray, Response::HTTP_OK );
    }

    /**
     * method which delete one random anecdote
     * 
     * @Route("/{userId}/random/delete/all", name="random_delete_all", methods={"DELETE"}, requirements={"anecdoteId"="\d+", "userId"="\d+"})
     */
    public function randomDeleteAll(int $userId, AnecdoteRepository $anecdoteRepository, EntityManagerInterface $entityManager): Response
    {
        //find user informations by userId
        $user = $this->userRepository->find($userId);
        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }
        //get all random anecdotes in user profil
        $randomAnecdotesList = $user->getRandomAnecdotes();

        //if random anecdote historical is empty
        if (count($randomAnecdotesList) == 0) {
            $responseAsArray = [
                'message' => 'Your random anecdote history is null, nothing to delete',
            ];
            return $this->json($responseAsArray, Response::HTTP_OK);
        }

        foreach($randomAnecdotesList as $anecdote){
            //get anecdote id in historical random anecdotes list
            $anecdoteId= $anecdote->getId();

            //find anecdote informations by anecdoteId
            $anecdote = $anecdoteRepository->find($anecdoteId);

            //delete the anecdote in random anecdotes historical
            $user->removeRandomAnecdote($anecdote);
        }
        
        //EntityManager edit the user object in database
        $entityManager->flush($user);

        $reponseAsArray = [
            'message' => 'all random anecdotes delete in your historical'
        ];

        return $this->json($reponseAsArray, Response::HTTP_OK );
    }

    /**
     * Return informations for not found response.
     */
    private function getNotFoundResponse() {

        $responseArray = [
            'error' => true,
            'userMessage' => 'Resource not found',
            'internalMessage' => 'This user isn\'t in databse',
        ];

        return $this->json($responseArray, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
