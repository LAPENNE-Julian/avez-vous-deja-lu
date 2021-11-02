<?php

namespace App\Controller\Api;

use App\Repository\AnecdoteRepository;
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
    /**
     * @Route("", name="browse", methods={"GET"})
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

        if (is_null($anecdote)) {
            return $this->getNotFoundResponse();
        }

        return $this->json($anecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Return informations of five anecdotes with the most upVote.
     * @Route("/best", name="best", methods={"GET"})
     */
    public function best(AnecdoteRepository $anecdoteRepository): Response
    {
        $bestAnecdotes = $anecdoteRepository->findByupVote();

        return $this->json($bestAnecdotes, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
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
