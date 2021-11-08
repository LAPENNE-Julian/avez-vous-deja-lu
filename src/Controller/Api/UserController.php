<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\AnecdoteRepository;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("api/user", name="api_user_")
 * @IsGranted("ROLE_USER")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="read", methods={"GET"})
     */
    public function read(UserRepository $userRepository, Request $request, SerializerInterface $serializer): Response
    {    
        //get Json content (user email)
        $jsonContent = $request->getContent();
    
        //replace Json Content to an object
        $userInSession = $serializer->deserialize($jsonContent, User::class, 'json');

        //get email in Json Content
        $email = $userInSession->getEmail();

        //Find user informations by email
        $user = $userRepository->findByEmail($email);

        //if the user email isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        return $this->json($user, Response::HTTP_OK, [], ['groups' => 'api_user_read']);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"PATCH"}, requirements={"id"="\d+"})
     */
    public function edit(int $id, UserRepository $userRepository, Request $request, ValidatorInterface $validator, SerializerInterface $serializer, EntityManagerInterface $entityManager): Response
    {
        //find user informations by userId
        $user = $userRepository->find($id);

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
     * List of favorite anecdotes user.
     * 
     * @Route("/{id}/favorite", name="favorite_browse", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function favoriteBrowse(int $id, UserRepository $userRepository): Response
    {
        //find user informations by userId
        $user = $userRepository->find($id);

        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //find list of favorite anecdotes user
        $userFavorites = $user->getFavorite();

        return $this->json($userFavorites, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Navigation to next in list of favorite anecdotes.
     * 
     * @Route("/{userId}/favorite/{anecdoteId}/next", name="latestNext", methods={"GET"})
     */
    public function favoriteNext(int $userId, int $anecdoteId, userRepository $userRepository): Response
    {
        //find user informations by userId
        $user = $userRepository->find($userId);

        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all favorite anecdotes for user
        $favoriteAnecdotesList = $user->getFavorite();

        //get key and informations foreach anecdotes in list
        foreach ($favoriteAnecdotesList as $key => $anecdote){
            //count key in array
            $indexMax = count($favoriteAnecdotesList) - 1;
            //get anecdote id in list
            $favoriteAnecdoteId = $anecdote->getId();
            
            //if the request id is egal to one of the anecdotid in the loop
            if($anecdoteId == $favoriteAnecdoteId){
                //the current anecdote is set to the current key
                $currentAnecdote = $favoriteAnecdotesList[$key];

                //if the current anecdote key is up to the count array
                if($currentAnecdote == $favoriteAnecdotesList[$indexMax]){
                    //return at the beginning of the array
                    $nextanecdote = $favoriteAnecdotesList[0]; 

                }else{
                    //pass to the next ocurence array
                    $nextanecdote = $favoriteAnecdotesList[$key + 1];
                }      
            }    
        }

        return $this->json($nextanecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * Navigation to previous in list of favorite anecdotes.
     * 
     * @Route("/{userId}/favorite/{anecdoteId}/prev", name="latestNext", methods={"GET"})
     */
    public function favoritePrev(int $userId, int $anecdoteId, UserRepository $userRepository): Response
    {
        //find user informations by userId
        $user = $userRepository->find($userId);

        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all favorite anecdotes for user
        $favoriteAnecdotesList = $user->getFavorite();

        //get key and informations foreach anecdotes in list
        foreach ($favoriteAnecdotesList as $key => $anecdote){
            //count key in array
            $indexMax = count($favoriteAnecdotesList) - 1;
            //get anecdote id in list
            $favoriteAnecdoteId = $anecdote->getId();
            
            //if the request id is egal to one of the anecdotid in the loop.
            if($anecdoteId == $favoriteAnecdoteId){
                //the current anecdote is set to the current key.
                $currentAnecdote = $favoriteAnecdotesList[$key];

                //if the current anecdote key is at the beginning of the array
                if($currentAnecdote == $favoriteAnecdotesList[0]){
                    //return to the end of the array
                    $nextanecdote = $favoriteAnecdotesList[$indexMax]; 

                }else{
                    //pass to the previous ocurence array
                    $nextanecdote = $favoriteAnecdotesList[$key - 1];
                }      
            }    
        }

        return $this->json($nextanecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * method which add one favorite
     * 
     * @Route("/{userId}/favorite/{anecdoteId}/add", name="favorite_add", methods={"GET","PATCH"})
     */
    public function favoriteAdd(int $userId, int $anecdoteId,UserRepository $userRepository, AnecdoteRepository $anecdoteRepository, EntityManagerInterface $entityManager): Response
    {
        //find user informations by userId
        $user = $userRepository->find($userId);
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
     * @Route("/{userId}/favorite/{anecdoteId}/delete", name="favorite_delete", methods={"GET","PATCH"})
     */
    public function favoriteDelete(int $userId, int $anecdoteId,UserRepository $userRepository, AnecdoteRepository $anecdoteRepository, EntityManagerInterface $entityManager): Response
    {
        //find user informations by userId
        $user = $userRepository->find($userId);
        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }
        //find anecdote informations by anecdoteId
        $favoriteAnecdote = $anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist
        if (is_null($favoriteAnecdote)) {
            return $this->getNotFoundResponse();
        }

        $user->removeFavorite($favoriteAnecdote);

        //EntityManager edit the user object in database
        $entityManager->flush($user);

        $reponseAsArray = [
            'message' => 'delete favorite'
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
