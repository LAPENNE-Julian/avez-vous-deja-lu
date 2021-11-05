<?php

namespace App\Controller\Api;

use App\Repository\CategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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
     * @IsGranted("ROLE_USER")
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
     * Navigation to next in anecdote list by category.
     * 
     * @Route("/{categoryId}/anecdote/{anecdoteId}/next", name="latestNext", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function next(int $categoryId, int $anecdoteId, CategoryRepository $categoryRepository): Response
    {
        //check if id request exist in database
        $category = $categoryRepository->find($categoryId);

        if (is_null($category)) {
            return $this->getNotFoundResponse();
        }

        //get all anecdotes for id request category
        $anecdotesListByCategory = $categoryRepository->findByCategory($categoryId);

        //get key and informations foreach anecdotes in list by category.
        foreach ($anecdotesListByCategory as $key => $anecdote){
            //count key in array
            $indexMax = count($anecdotesListByCategory) - 1;
            //get anecdote id in list by category
            $anecdoteIdInList = $anecdote->getId();
            
            //if the request id is egal to one of the anecdotid in the loop.
            if($anecdoteId == $anecdoteIdInList){
                //the current anecdote is set to the current key.
                $currentAnecdote = $anecdotesListByCategory[$key];

                //if the current anecdote key is up to the count array
                if($currentAnecdote == $anecdotesListByCategory[$indexMax]){
                    //return at the beginning of the array
                    $nextanecdote = $anecdotesListByCategory[0]; 

                }else{
                    //pass to the next ocurence array
                    $nextanecdote = $anecdotesListByCategory[$key + 1];
                }      
            }    
        }

        return $this->json($nextanecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
    }

    /**
     * Navigation to previous in anecdote list by category.
     * 
     * @Route("/{categoryId}/anecdote/{anecdoteId}/prev", name="prev", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function previous(int $categoryId, int $anecdoteId, CategoryRepository $categoryRepository): Response
    {
        //check if id request exist in database
        $category = $categoryRepository->find($categoryId);

        if (is_null($category)) {
            return $this->getNotFoundResponse();
        }

        //get all anecdotes for id request category
        $anecdotesListByCategory = $categoryRepository->findByCategory($categoryId);

        //get key and informations foreach anecdotes in list by category.
        foreach ($anecdotesListByCategory as $key => $anecdote){
            //count key in array
            $indexMax = count($anecdotesListByCategory) - 1;
            //get anecdote id in list by category
            $anecdoteIdInList = $anecdote->getId();
            
            //if the request id is egal to one of the anecdotid in the loop.
            if($anecdoteId == $anecdoteIdInList){
                //the current anecdote is set to the current key.
                $currentAnecdote = $anecdotesListByCategory[$key];

                //if the current anecdote key is at the beginning of the array
                if($currentAnecdote == $anecdotesListByCategory[0]){
                    //return to the end of the array
                    $nextanecdote = $anecdotesListByCategory[$indexMax]; 

                }else{
                    //pass to the previous ocurence array
                    $nextanecdote = $anecdotesListByCategory[$key - 1];
                }      
            }    
        }

        return $this->json($nextanecdote, Response::HTTP_OK, [], ['groups' => 'api_anecdote_read']);
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
