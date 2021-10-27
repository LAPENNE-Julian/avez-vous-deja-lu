<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/category", name="backoffice_category_")
 */
class CategoryController extends AbstractController
{
    /**
     * function which list categories
     * 
     * @Route("/", name="browse")
     */
    public function browse(CategoryRepository $categoryRepository): Response
    {
        // transfert informations to the view
        return $this->render('category/browse.html.twig', [
            'category_list' => $categoryRepository->findAll(),
        ]);
    }
}
