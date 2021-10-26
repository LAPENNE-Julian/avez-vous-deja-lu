<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnecdoteController extends AbstractController
{
    /**
     * @Route("/anecdote", name="anecdote")
     */
    public function index(): Response
    {
        return $this->render('anecdote/index.html.twig', [
            'controller_name' => 'AnecdoteController',
        ]);
    }
}
