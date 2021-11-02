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
     * Affiche les 5 denières anecdotes
     * 
     * @Route("/latest", name="latest")
     */
    public function latest(AnecdoteRepository $anecdoteRepository): Response
    {
        $latestAnecdote = $anecdoteRepository->findBy([], ['createdAt' => 'DESC'], 5);

        return $this->json($latestAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    private function getNotFoundResponse() {

        $responseArray = [
            'error' => true,
            'userMessage' => 'Ressource non trouvée',
            'internalMessage' => 'Cet anecdote n\'existe pas dans la BDD',
        ];

        return $this->json($responseArray, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
