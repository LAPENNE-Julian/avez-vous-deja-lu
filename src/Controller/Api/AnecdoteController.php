<?php

namespace App\Controller\Api;

use App\Repository\AnecdoteRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;


/**
 * @Route("api/anecdote", name="api_anecdote_")
 * 
 */
class AnecdoteController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function browse(AnecdoteRepository $anecdoteRepository): Response
    {
        $allAnecdotes = $anecdoteRepository->findAll();

        return $this->json($allAnecdotes, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);

    }

    /**
     * @Route("/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(int $id, AnecdoteRepository $anecdoteRepository): Response
    {
        $anecdote = $anecdoteRepository->find($id);

        //if the anecdote id isn't exist.
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        return $this->json($anecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * Navigation to read next of all anecdotes.
     * 
     * @Route("/{id}/next", name="readNext", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function readNext(int $id, AnecdoteRepository $anecdoteRepository): Response
    {
        //Check if anecdote id exist in database
        $anecdote = $anecdoteRepository->find($id);

        //if the anecdote id isn't exist. 
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        // find all anecdotes in database
        $allAnecdotes = $anecdoteRepository->findAll();
       
        //get key and informations foreach anecdotes.
        foreach ($allAnecdotes as $key => $anecdote){
            //count key in array
            $indexMax = count($allAnecdotes) - 1;
            //get anecdote id
            $anecdoteId = $anecdote->getId();
            
            //if the request id is egal to one of the anecdote id in the loop.
            if($id == $anecdoteId){
                //the current anecdote is set to the current key.
                $currentAnecdote = $allAnecdotes[$key];

                //if the current anecdote key is up to the count array
                if($currentAnecdote == $allAnecdotes[$indexMax]){
                    //return at the beginning of the array
                    $nextAnecdote = $allAnecdotes[0]; 

                }else{
                    //pass to the next ocurence array
                    $nextAnecdote = $allAnecdotes[$key + 1];
                }      
            }    
        }

        return $this->json($nextAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Navigation to read previous of all anecdotes.
     * 
     * @Route("/{id}/prev", name="readPrev", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function readPrev(int $id, AnecdoteRepository $anecdoteRepository): Response
    {
        //Check if anecdote id exist in database
        $anecdote = $anecdoteRepository->find($id);

        //if the anecdote id isn't exist. 
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        // find all anecdotes in database
        $allAnecdotes = $anecdoteRepository->findAll();

        //get key and informations foreach five anecdotes with the most upVote.
        foreach ($allAnecdotes as $key => $anecdote){
            //count key in array
            $indexMax = count($allAnecdotes) - 1;
            //get anecdote id
            $anecdoteId = $anecdote->getId();
            
            //if the request id is egal to one of the anecdote id in the loop.
            if($id == $anecdoteId){
                //the current anecdote is set to the current key.
                $currentanecdote = $allAnecdotes[$key];

                //if the current anecdote key is at the beginning array
                if ($currentanecdote == $allAnecdotes[0]){
                    //return at the end of the array
                    $nextAnecdote = $allAnecdotes[$indexMax]; 

                }else{
                    //pass to the previous ocurence array
                    $nextAnecdote = $allAnecdotes[$key - 1];
                }      
            }    
        }

        return $this->json($nextAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Return informations of five anecdotes with the most upVote.
     *
     * @Route("/best", name="best", methods={"GET"})
     */
    public function best(AnecdoteRepository $anecdoteRepository): Response
    {
        $bestAnecdotes = $anecdoteRepository->findByupVote();

            //if haven't five anecdotes with upVote.
            if (count($bestAnecdotes) !== 5) {

                //random five anecdotes.
                $randomAnecdotes = $anecdoteRepository->findBy([], ['title' => 'ASC'], 5);
                
                return $this->json($randomAnecdotes, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
            }

        return $this->json($bestAnecdotes, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Navigation to next in five anecdotes with the most upVote.
     * 
     * @Route("/best/{id}/next", name="bestNext", methods={"GET"})
     */
    public function bestNext(int $id, AnecdoteRepository $anecdoteRepository): Response
    {
        //get an array of five anecdotes with the most upVote.
        $bestAnecdotes = $anecdoteRepository->findByupVote();

            //if haven't five anecdotes with upVote.
            if (count($bestAnecdotes) !== 5) {
                //random five anecdotes.
                $bestAnecdotes = $anecdoteRepository->findBy([], ['title' => 'ASC'], 5);
            }

        //get key and informations foreach five anecdotes with the most upVote.
        foreach ($bestAnecdotes as $key => $anecdote){
            //count key in array
            $indexMax = count($bestAnecdotes) - 1;
            //get anecdote id
            $bestAnecdoteId = $anecdote->getId();
            
            //if the request id is egal to one of the anecdote id in the loop.
            if($id == $bestAnecdoteId){
                //the current anecdote is set to the current key.
                $currentAnecdote = $bestAnecdotes[$key];

                //if the current anecdote key is up to the count array
                if($currentAnecdote == $bestAnecdotes[$indexMax]){
                    //return at the beginning of the array
                    $nextAnecdote = $bestAnecdotes[0]; 

                }else{
                    //pass to the next ocurence array
                    $nextAnecdote = $bestAnecdotes[$key + 1];
                }      
            }    
        }

        return $this->json($nextAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Navigation to previous in five anecdotes with the most upVote.
     * 
     * @Route("/best/{id}/prev", name="bestPrev", methods={"GET"})
     */
    public function bestPrev(int $id, AnecdoteRepository $anecdoteRepository): Response
    {
        //get an array of five anecdotes with the most upVote.
        $bestAnecdotes = $anecdoteRepository->findByupVote();

            //if haven't five anecdotes with upVote.
            if (count($bestAnecdotes) !== 5) {
                //random five anecdotes.
                $bestAnecdotes = $anecdoteRepository->findBy([], ['title' => 'ASC'], 5);
            }

        //get key and informations foreach five anecdotes with the most upVote.
        foreach ($bestAnecdotes as $key => $anecdote){
            //count key in array
            $indexMax = count($bestAnecdotes) - 1;
            //get anecdote id
            $bestAnecdoteId = $anecdote->getId();
            
            //if the request id is egal to one of the anecdote id in the loop.
            if($id == $bestAnecdoteId){
                //the current anecdote is set to the current key.
                $currentanecdote = $bestAnecdotes[$key];

                //if the current anecdote key is at the beginning array
                if ($currentanecdote == $bestAnecdotes[0]){
                    //return at the end of the array
                    $nextAnecdote = $bestAnecdotes[$indexMax]; 

                }else{
                    //pass to the previous ocurence array
                    $nextAnecdote = $bestAnecdotes[$key - 1];
                }      
            }    
        }

        return $this->json($nextAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }
    
    /**
     * Get five latest anecdotes
     * 
     * @Route("/latest", name="latest",  methods={"GET"})
     */
    public function latest(AnecdoteRepository $anecdoteRepository): Response
    {
        $latestAnecdotes = $anecdoteRepository->findBy([], ['createdAt' => 'DESC'], 5);

        return $this->json($latestAnecdotes, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Navigation to next in five latest anecdotes.
     * 
     * @Route("/latest/{id}/next", name="latestNext", methods={"GET"})
     */
    public function latestNext(int $id, AnecdoteRepository $anecdoteRepository): Response
    {
        $latestAnecdotes = $anecdoteRepository->findBy([], ['createdAt' => 'DESC'], 5);

        //get key and informations foreach five latest anecdotes.
        foreach ($latestAnecdotes as $key => $anecdote){
            //count key in array
            $indexMax = count($latestAnecdotes) - 1;
            //get anecdote id
            $latestAnecdoteId = $anecdote->getId();
            
            //if the request id is egal to one of the anecdote id in the loop.
            if($id == $latestAnecdoteId){
                //the current anecdote is set to the current key.
                $currentAnecdote = $latestAnecdotes[$key];

                //if the current anecdote key is up to the count array
                if($currentAnecdote == $latestAnecdotes[$indexMax]){
                    //return at the beginning of the array
                    $nextAnecdote = $latestAnecdotes[0]; 

                }else{
                    //pass to the next ocurence array
                    $nextAnecdote = $latestAnecdotes[$key + 1];
                }      
            }    
        }

        return $this->json($nextAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Navigation to previous in five latest anecdotes.
     * 
     * @Route("/latest/{id}/prev", name="latestPrev", methods={"GET"})
     */
    public function latestPrev(int $id, AnecdoteRepository $anecdoteRepository): Response
    {
        $latestAnecdotes = $anecdoteRepository->findBy([], ['createdAt' => 'DESC'], 5);

        //get key and informations foreach five latest anecdotes.
        foreach ($latestAnecdotes as $key => $anecdote){
            //count key in array
            $indexMax = count($latestAnecdotes) - 1;
            //get anecdote id
            $latestAnecdoteId = $anecdote->getId();
            
            //if the request id is egal to one of the anecdote id in the loop.
            if($id == $latestAnecdoteId){
                //the current anecdote is set to the current key.
                $currentAnecdote = $latestAnecdotes[$key];

                //if the current anecdote key is at the beginning array
                if ($currentAnecdote == $latestAnecdotes[0]){
                    //return at the end of the array
                    $nextAnecdote = $latestAnecdotes[$indexMax]; 

                }else{
                    //pass to the previous ocurence array
                    $nextAnecdote = $latestAnecdotes[$key - 1];
                }      
            }    
        }

        return $this->json($nextAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * @Route("/{anecdoteId}/user/{userId}/upvote", name="upVote", methods={"GET","PATCH"})
     */
    public function upVote(int $anecdoteId, int $userId, AnecdoteRepository $anecdoteRepository, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        //Check if anecdote id exist in database
        $anecdote = $anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist. 
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //find user informations by userId
        $user = $userRepository->find($userId);
        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all downvoteUsers to the anecdote
        $allDownVoters = $anecdote->getDownVoteUsers();

        foreach($allDownVoters as $userVoter){

            $userVoterId = $userVoter->getId();

            //find user informations by userId
            $user = $userRepository->find($userId);

            if($userVoterId == $userId){
                //remove user in DownVoteUsers anecdote
                $anecdote->removeDownVoteUser($user);
            }
            
        }

        //add an upvoteUser to the anecdote
        $addUpvote = $anecdote->addUpVoteUser($user);

        //EntityManager edit the anecdote object in database
        $entityManager->flush($user);

        $reponseAsArray = [
            'message' => 'Anecdote upVoted'
        ];

        return $this->json($reponseAsArray, Response::HTTP_OK );

    }

    /**
     * @Route("/{anecdoteId}/user/{userId}/downvote", name="downVote", methods={"GET","PATCH"})
     */
    public function downVote(int $anecdoteId, int $userId, AnecdoteRepository $anecdoteRepository, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        //Check if anecdote id exist in database
        $anecdote = $anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist. 
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //find user informations by userId
        $user = $userRepository->find($userId);
        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all upvoteUsers to the anecdote
        $allUpVoters = $anecdote->getUpVoteUsers();

        foreach($allUpVoters as $userVoter){

            $userVoterId = $userVoter->getId();

            //find user informations by userId
            $user = $userRepository->find($userId);

            if($userVoterId == $userId){
                //remove user in upVoteUser anecdote
                $anecdote->removeUpVoteUser($user);
            }
            
        }

        //add an downVoteUser to the anecdote
        $addUpvote = $anecdote->addDownVoteUser($user);

        //EntityManager edit the anecdote object in database
        $entityManager->flush($user);

        $reponseAsArray = [
            'message' => 'Anecdote downVoted'
        ];

        return $this->json($reponseAsArray, Response::HTTP_OK );

    }

    /**
     * @Route("/{anecdoteId}/user/{userId}/known", name="known", methods={"GET","PATCH"})
     */
    public function known(int $anecdoteId, int $userId, AnecdoteRepository $anecdoteRepository, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        //Check if anecdote id exist in database
        $anecdote = $anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist. 
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //find user informations by userId
        $user = $userRepository->find($userId);
        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all unknownUsers for the anecdote
        $allUnknownVoters = $anecdote->getUnknownUsers();

        foreach($allUnknownVoters as $userVoter){

            $userVoterId = $userVoter->getId();

            //find user informations by userId
            $user = $userRepository->find($userId);

            if($userVoterId == $userId){
                //remove user in unknownUsers anecdote
                $anecdote->removeUnknownUser($user);
            }
            
        }

        //add an knownUser to the anecdote
        $addUpvote = $anecdote->addKnownUser($user);

        //EntityManager edit the anecdote object in database
        $entityManager->flush($user);

        $reponseAsArray = [
            'message' => 'Anecdote known'
        ];

        return $this->json($reponseAsArray, Response::HTTP_OK );

    }

    /**
     * @Route("/{anecdoteId}/user/{userId}/unknown", name="unknown", methods={"GET","PATCH"})
     */
    public function unknown(int $anecdoteId, int $userId, AnecdoteRepository $anecdoteRepository, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        //Check if anecdote id exist in database
        $anecdote = $anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist. 
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //find user informations by userId
        $user = $userRepository->find($userId);
        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //add all knownvoteUser to the anecdote
        $allknownUsers = $anecdote->getknownUsers();

        foreach($allknownUsers as $userVoter){

            $userVoterId = $userVoter->getId();

            //find user informations by userId
            $user = $userRepository->find($userId);

            if($userVoterId == $userId){
                //remove user in knownVoteUsers anecdote
                $anecdote->removeKnownUser($user);
            }
            
        }

        //add an unknownVoteUser to the anecdote
        $addUpvote = $anecdote->addUnknownUser($user);

        //EntityManager edit the anecdote object in database
        $entityManager->flush($user);

        $reponseAsArray = [
            'message' => 'Anecdote unknown'
        ];

        return $this->json($reponseAsArray, Response::HTTP_OK );

    }

    /**
     * Get random anecdotes
     * 
     * @Route("/random", name="random",  methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function random(AnecdoteRepository $anecdoteRepository): Response
    {
        $allAnecdotes = $anecdoteRepository->findAll();

        $anecdotesIndex = count($allAnecdotes);

        $randomIndex = rand(1, $anecdotesIndex);

        $randomAnecdotes = [];

        $anecdote = $anecdoteRepository->find($randomIndex);

        // $randomAnecdotes[] += $randomIndex;

        return $this->json($anecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }
  
    /**
     * Return informations for not found response.
     */
    private function getNotFoundResponse() {

        $responseArray = [
            'error' => true,
            'userMessage' => 'Resource not found',
            'internalMessage' => 'This anecdote isn\'t in databse',
        ];

        return $this->json($responseArray, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
