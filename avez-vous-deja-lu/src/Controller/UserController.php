<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/user", name="backoffice_user_")
 */
class UserController extends AbstractController
{
    /**
     * function which list users
     * 
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(UserRepository $userRepository): Response
    {
        // transfert informations to the view
        return $this->render('user/browse.html.twig', [
            'user_list' => $userRepository->findAll()
        ]);
    }
}
