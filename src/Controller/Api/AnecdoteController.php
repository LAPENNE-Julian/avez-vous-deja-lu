<?php

namespace App\Controller\Api;

use App\Repository\AnecdoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/anecdotes", name="api_anecdote_")
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
}
