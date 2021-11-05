<?php

namespace App\Controller\Api;

use App\Repository\AnecdoteRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("api/user", name="api_user_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(int $id, UserRepository $userRepository): Response
    {
        $user = $userRepository->find($id);

        //if the user id isn't exist.
        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }

        return $this->json($user, Response::HTTP_OK, [], ['groups' => 'api_user_read']);
    }

    /**
     * method which add one favorite
     * 
     * @Route("/{userId}/favorite/{anecdoteId}/add", name="add_favorite", methods={"GET" , "PUT"})
     */
    public function addFavorite(int $userId, int $anecdoteId,UserRepository $userRepository, AnecdoteRepository $anecdoteRepository, EntityManagerInterface $entityManager): Response
    {
        //find user informations by userId
        $user = $userRepository->find($userId);
        //find anecdote informations by anecdoteId
        $newFavoriteAnecdote = $anecdoteRepository->find($anecdoteId);

        $user->addFavorite($newFavoriteAnecdote);

        //EntityManager edit the user object in database
        $entityManager->flush($user);

        $reponseAsArray = [
            'message' => 'add favorite'
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
