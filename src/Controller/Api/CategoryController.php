<?php

namespace App\Controller\Api;

use App\Repository\CategoryRepository;
use App\Utils\ApiNavigationAnecdote;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("api/category", name="api_category_")
 */
class CategoryController extends AbstractController
{
    private $apiNavigationAnecdote;
    
    public function __construct(ApiNavigationAnecdote $apiNavigationAnecdote )
    {
        $this->apiNavigationAnecdote = $apiNavigationAnecdote;
    }

    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(CategoryRepository $categoryRepository): Response
    {
        $allCategories = $categoryRepository->findAll();

        return $this->json($allCategories, Response::HTTP_OK, [], ['groups' => 'api_category_browse']);

    }

    /**
     * @Route("/{categorySlug}/anecdote", name="browse_anecdotes", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function browseAnecdotes(string $categorySlug, CategoryRepository $categoryRepository): Response
    {
        //get all anecdotes for category slug request 
        $anecdotesByCategory = $categoryRepository->findByCategory($categorySlug);

        if (is_null($anecdotesByCategory)) {
            return $this->getNotFoundResponse();
        }

        return $this->json($anecdotesByCategory, Response::HTTP_OK, [], ['groups' => 'api_anecdote_browse']);
    }

    /**
     * Find category name by slugger.
     * 
     * @Route("/{categorySlug}/name", name="category_name_by_slugger", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function findCategoryNameBySlug(string $categorySlug, CategoryRepository $categoryRepository): Response
    {
        //get all informations category for category slug request 
        $category = $categoryRepository->findCategoryNameBySlug($categorySlug);

            if (is_null($category)) {
                return $this->getNotFoundResponse();
            }
       
        //get the name of the category
        $categoryName = $category->getName();

        return $this->json($categoryName, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * Navigation to next in anecdote list by category.
     * 
     * @Route("/{categorySlug}/anecdote/{anecdoteId}/next", name="next_anecdote", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function next(string $categorySlug, int $anecdoteId, CategoryRepository $categoryRepository): Response
    {
        //get all anecdotes for category slug request 
        $anecdotesListByCategory = $categoryRepository->findByCategory($categorySlug);

            if (is_null($anecdotesListByCategory)) {
                return $this->getNotFoundResponse();
            }
       
        $nextAnecdote = $this->apiNavigationAnecdote->next($anecdotesListByCategory, $anecdoteId);

            //if the anecdote id isn't exist in the $anecdotesListByCategory
            if ($nextAnecdote == false) {
                return $this->getNotFoundResponse();
            }

        return $this->json($nextAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * Navigation to previous in anecdote list by category.
     * 
     * @Route("/{categorySlug}/anecdote/{anecdoteId}/prev", name="previous_anecdote", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function previous(string $categorySlug, int $anecdoteId, CategoryRepository $categoryRepository): Response
    {
        //get all anecdotes for category slug request
        $anecdotesListByCategory = $categoryRepository->findByCategory($categorySlug);
        
            if (is_null($anecdotesListByCategory)) {
                return $this->getNotFoundResponse();
            }

        $previousAnecdote = $this->apiNavigationAnecdote->previous($anecdotesListByCategory, $anecdoteId);

            //if the anecdote id isn't exist in the $anecdotesListByCategory
            if ($previousAnecdote == false) {
                return $this->getNotFoundResponse();
            }

        return $this->json($previousAnecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
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
