<?php

namespace App\Controller;

use App\Repository\AnecdoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/anecdote", name="backoffice_anecdote_")
 */
class AnecdoteController extends AbstractController
{
    /**
     * function which list anecdotes
     * 
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(AnecdoteRepository $anecdoteRepository): Response
    {
        // transfert informations to the view
        return $this->render('anecdote/browse.html.twig', [
            'anecdote_list' => $anecdoteRepository->findAll()
        ]);
    }
}
