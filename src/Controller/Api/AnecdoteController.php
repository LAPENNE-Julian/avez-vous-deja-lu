<?php

namespace App\Controller\Api;

use App\Repository\AnecdoteRepository;
use App\Repository\UserRepository;
use App\Utils\ApiNavigationAnecdote;
use App\Utils\ApiUserImageUrl;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;


/**
 * @Route("api/anecdote", name="api_anecdote_")
 */
class AnecdoteController extends AbstractController
{
    private $apiNavigationAnecdote;
    private $anecdoteRepository;
    
    public function __construct(AnecdoteRepository $anecdoteRepository, ApiNavigationAnecdote $apiNavigationAnecdote)
    {
        $this->anecdoteRepository = $anecdoteRepository;
        $this->apiNavigationAnecdote = $apiNavigationAnecdote;
    }

    /**
     * Get all anecdotes.
     * 
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(): Response
    {
        $allAnecdotes = $this->anecdoteRepository->findAll();

        return $this->json($allAnecdotes, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);

    }

    /**
     * Read an anecdote by id.
     * 
     * @Route("/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     * @IsGranted("ROLE_USER")
     */
    public function read(int $id): Response
    {
        $anecdote = $this->anecdoteRepository->find($id);

        //if the anecdote id isn't exist 
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        return $this->json($anecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * Navigation to read next of all anecdotes.
     * 
     * @Route("/{id}/next", name="read_next", methods={"GET"}, requirements={"id"="\d+"})
     * @IsGranted("ROLE_USER")
     */
    public function readNext(int $id): Response
    {
        //check if anecdote id exist in database
        $anecdote = $this->anecdoteRepository->find($id);

        //if the anecdote id isn't exist
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //find all anecdotes in database
        $allAnecdotes = $this->anecdoteRepository->findAll();
       
        $nextAnecdote = $this->apiNavigationAnecdote->next($allAnecdotes, $id);

            //if the anecdote id isn't exist in the $allAnecdotes
            if ($nextAnecdote == false) {
                return $this->getNotFoundResponse();
            }

        return $this->json($nextAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * Navigation to read previous of all anecdotes.
     * 
     * @Route("/{id}/prev", name="read_previous", methods={"GET"}, requirements={"id"="\d+"})
     * @IsGranted("ROLE_USER")
     */
    public function readPrevious(int $id): Response
    {
        //check if anecdote id exist in database
        $anecdote = $this->anecdoteRepository->find($id);

        //if the anecdote id isn't exist
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //find all anecdotes in database
        $allAnecdotes = $this->anecdoteRepository->findAll();

        $previousAnecdote = $this->apiNavigationAnecdote->previous($allAnecdotes, $id);

            //if the anecdote id isn't exist in the $allAnecdotes
            if ($previousAnecdote == false) {
                return $this->getNotFoundResponse();
            }

        return $this->json($previousAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * Return informations of five anecdotes with the most upVote.
     *
     * @Route("/best", name="best", methods={"GET"})
     */
    public function best(): Response
    {
        $bestAnecdotes = $this->anecdoteRepository->findByupVote();

            //if haven't five anecdotes with upVote
            if (count($bestAnecdotes) !== 5) {

                //random five anecdotes
                $randomAnecdotes = $this->anecdoteRepository->findBy([], ['title' => 'ASC'], 5);
                
                return $this->json($randomAnecdotes, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
            }

        return $this->json($bestAnecdotes, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Read an best anecdote by id.
     * 
     * @Route("/best/{id}", name="best_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function bestRead(int $id): Response
    {
        //get an array of five anecdotes with the most upVote
        $bestAnecdotes = $this->anecdoteRepository->findByupVote();

            //if haven't five anecdotes with upVote
            if (count($bestAnecdotes) !== 5) {
                //random five anecdotes
                $bestAnecdotes = $this->anecdoteRepository->findBy([], ['title' => 'ASC'], 5);
            }

        //get informations foreach anecdotes
        foreach ($bestAnecdotes as $anecdote){
            //get anecdote id
            $anecdoteId = $anecdote->getId();

            //if the request id is egal to one of the anecdote id in the loop
            if($anecdoteId == $id){
                //find all informations of the anecdote by id
                $anecdote = $this->anecdoteRepository->find($id);

               return $this->json($anecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
            }
        }

        //if the anecdote id isn't exist in the $bestAnecdote
        return $this->getNotFoundResponse();
    }

    /**
     * Navigation to next in five anecdotes with the most upVote.
     * 
     * @Route("/best/{id}/next", name="best_next", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function bestNext(int $id): Response
    {
        //get an array of five anecdotes with the most upVote
        $bestAnecdotes = $this->anecdoteRepository->findByupVote();

            //if haven't five anecdotes with upVote
            if (count($bestAnecdotes) !== 5) {
                //random five anecdotes
                $bestAnecdotes = $this->anecdoteRepository->findBy([], ['title' => 'ASC'], 5);
            }

        $nextAnecdote = $this->apiNavigationAnecdote->next($bestAnecdotes, $id);

            //if the anecdote id isn't exist in the $bestAnecdote
            if ($nextAnecdote == false) {
                return $this->getNotFoundResponse();
            }
        
        return $this->json($nextAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * Navigation to previous in for five anecdotes with the most upVote.
     * 
     * @Route("/best/{id}/prev", name="best_previous", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function bestPrevious(int $id): Response
    {
        //get an array of five anecdotes with the most upVote
        $bestAnecdotes = $this->anecdoteRepository->findByupVote();

            //if haven't five anecdotes with upVote
            if (count($bestAnecdotes) !== 5) {
                //random five anecdotes
                $bestAnecdotes = $this->anecdoteRepository->findBy([], ['title' => 'ASC'], 5);
            }

        $previousAnecdote = $this->apiNavigationAnecdote->previous($bestAnecdotes, $id);
            
            //if the anecdote id isn't exist in the $bestAnecdote
            if ($previousAnecdote == false) {
                return $this->getNotFoundResponse();
            }

        return $this->json($previousAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }
    
    /**
     * Get five latest anecdotes
     * 
     * @Route("/latest", name="latest",  methods={"GET"})
     */
    public function latest(): Response
    {
        $latestAnecdotes = $this->anecdoteRepository->findBy([], ['createdAt' => 'DESC'], 5);

        return $this->json($latestAnecdotes, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Read an best anecdote by id.
     * 
     * @Route("/latest/{id}", name="latest_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function latestRead(int $id): Response
    {
        $latestAnecdotes = $this->anecdoteRepository->findBy([], ['createdAt' => 'DESC'], 5);

        //get informations foreach anecdotes
        foreach ($latestAnecdotes as $anecdote){
            //get anecdote id
            $anecdoteId = $anecdote->getId();

            //if the request id is egal to one of the anecdote id in the loop
            if($anecdoteId == $id){
                //find all informations of the anecdote by id
                $anecdote = $this->anecdoteRepository->find($id);

               return $this->json($anecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
            }
        }

        //if the anecdote id isn't exist in the $latestAnecdote
        return $this->getNotFoundResponse();
    }

    /**
     * Navigation to next in five latest anecdotes.
     * 
     * @Route("/latest/{id}/next", name="latest_next", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function latestNext(int $id): Response
    {
        $latestAnecdotes = $this->anecdoteRepository->findBy([], ['createdAt' => 'DESC'], 5);

        $nextAnecdote = $this->apiNavigationAnecdote->next($latestAnecdotes, $id);

            //if the anecdote id isn't exist in the $latestAnecdotes
            if ($nextAnecdote == false) {
                return $this->getNotFoundResponse();
            }

        return $this->json($nextAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * Navigation to previous in five latest anecdotes.
     * 
     * @Route("/latest/{id}/prev", name="latest_previous", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function latestPrevious(int $id): Response
    {
        $latestAnecdotes = $this->anecdoteRepository->findBy([], ['createdAt' => 'DESC'], 5);

        $previousAnecdote = $this->apiNavigationAnecdote->previous($latestAnecdotes, $id);

            //if the anecdote id isn't exist in the $latestAnecdote
            if ($previousAnecdote == false) {
                return $this->getNotFoundResponse();
            }

        return $this->json($previousAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * User can put an upVote to an anecdote.
     * 
     * @Route("/{anecdoteId}/user/{userId}/upvote", name="upVote", methods={"POST"}, requirements={"anecdoteId"="\d+", "userId"="\d+"})
     * @IsGranted("ROLE_USER")
     */
    public function upVote(int $anecdoteId, int $userId, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        //check if anecdote id exist in database
        $anecdote = $this->anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //find user informations by userId
        $user = $userRepository->find($userId);
        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all downvoteUsers to the anecdote
        $allDownVoters = $anecdote->getDownVoteUsers();

        foreach($allDownVoters as $userVoter){
            //get user id
            $userVoterId = $userVoter->getId();

            //find user informations by userId
            $user = $userRepository->find($userId);

            if($userVoterId == $userId){
                //remove user in downVoteUsers anecdote
                $anecdote->removeDownVoteUser($user);
            } 
        }

        //add an upVoteUser to the anecdote
        $addUpVote = $anecdote->addUpVoteUser($user);

        //EntityManager edit the anecdote object in database
        $entityManager->flush($user);

        $responseAsArray = [
            'message' => 'Anecdote upVoted'
        ];

        return $this->json($responseAsArray, Response::HTTP_OK );

    }

    /**
     * User can put a downVote to an anecdote.
     * 
     * @Route("/{anecdoteId}/user/{userId}/downvote", name="downVote", methods={"POST"}, requirements={"anecdoteId"="\d+", "userId"="\d+"} )
     * @IsGranted("ROLE_USER")
     */
    public function downVote(int $anecdoteId, int $userId, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        //check if anecdote id exist in database
        $anecdote = $this->anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //find user informations by userId
        $user = $userRepository->find($userId);
        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all upVoteUsers to the anecdote
        $allUpVoters = $anecdote->getUpVoteUsers();

        foreach($allUpVoters as $userVoter){
            //get user id
            $userVoterId = $userVoter->getId();

            //find user informations by userId
            $user = $userRepository->find($userId);

            if($userVoterId == $userId){
                //remove user in upVoteUser anecdote
                $anecdote->removeUpVoteUser($user);
            } 
        }

        //add an downVoteUser to the anecdote
        $addDownVote = $anecdote->addDownVoteUser($user);

        //EntityManager edit the anecdote object in database
        $entityManager->flush($user);

        $responseAsArray = [
            'message' => 'Anecdote downVoted'
        ];

        return $this->json($responseAsArray, Response::HTTP_OK );

    }

    /**
     * User can put a known to an anecdote.
     * 
     * @Route("/{anecdoteId}/user/{userId}/known", name="known", methods={"POST"}, requirements={"anecdoteId"="\d+", "userId"="\d+"})
     * @IsGranted("ROLE_USER")
     */
    public function known(int $anecdoteId, int $userId, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        //check if anecdote id exist in database
        $anecdote = $this->anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //find user informations by userId
        $user = $userRepository->find($userId);
        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //get all unknownUsers for the anecdote
        $allUnknownVoters = $anecdote->getUnknownUsers();

        foreach($allUnknownVoters as $userVoter){
            //get user id
            $userVoterId = $userVoter->getId();

            //find user informations by userId
            $user = $userRepository->find($userId);

            if($userVoterId == $userId){
                //remove user in unknownUsers anecdote
                $anecdote->removeUnknownUser($user);
            }
        }

        //add an knownUser to the anecdote
        $addKnownVote = $anecdote->addKnownUser($user);

        //EntityManager edit the anecdote object in database
        $entityManager->flush($user);

        $responseAsArray = [
            'message' => 'Anecdote known'
        ];

        return $this->json($responseAsArray, Response::HTTP_OK );

    }

    /**
     * User can put a unknown to an anecdote.
     * 
     * @Route("/{anecdoteId}/user/{userId}/unknown", name="unknown", methods={"POST"}, requirements={"anecdoteId"="\d+", "userId"="\d+"})
     * @IsGranted("ROLE_USER")
     */
    public function unknown(int $anecdoteId, int $userId, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        //check if anecdote id exist in database
        $anecdote = $this->anecdoteRepository->find($anecdoteId);
        //if the anecdote id isn't exist
        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        //find user informations by userId
        $user = $userRepository->find($userId);
        //if the user id isn't exist
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        //add all knownvoteUser to the anecdote
        $allknownUsers = $anecdote->getknownUsers();

        foreach($allknownUsers as $userVoter){
            //get user id
            $userVoterId = $userVoter->getId();

            //find user informations by userId
            $user = $userRepository->find($userId);

            if($userVoterId == $userId){
                //remove user in knownVoteUsers anecdote
                $anecdote->removeKnownUser($user);
            }
        }

        //add an unknownVoteUser to the anecdote
        $addUnknownVote = $anecdote->addUnknownUser($user);

        //EntityManager edit the anecdote object in database
        $entityManager->flush($user);

        $responseAsArray = [
            'message' => 'Anecdote unknown'
        ];

        return $this->json($responseAsArray, Response::HTTP_OK );

    }

    /**
     * Return informations for not found response.
     */
    private function getNotFoundResponse() {

        $responseArray = [
            'error' => true,
            'userMessage' => 'Resource not found',
            'internalMessage' => 'This anecdote isn\'t in database',
        ];

        return $this->json($responseArray, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
