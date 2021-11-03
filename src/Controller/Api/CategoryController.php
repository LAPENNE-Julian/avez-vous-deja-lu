<?php

namespace App\Controller\Api;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("api/category", name="api_category_")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(CategoryRepository $categoryRepository): Response
    {
        $allCategories = $categoryRepository->findAll();

        return $this->json($allCategories, Response::HTTP_OK, [], ['groups' => 'api_category_browse']);

    }

    /**
     * @Route("/{id}/anecdote", name="browse_anecdotes", methods={"GET"})
     */
    public function browseAnecdotes(int $id, CategoryRepository $categoryRepository): Response
    {
        //check if id request exist in database
        $category = $categoryRepository->find($id);

        if (is_null($category)) {
            return $this->getNotFoundResponse();
        }

        //get all anecdotes for id request category
        $anecdotesByCategory = $categoryRepository->findByCategory($id);

        return $this->json($anecdotesByCategory, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
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
