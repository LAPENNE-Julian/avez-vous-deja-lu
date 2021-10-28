<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(CategoryRepository $categoryRepository): Response
    {
        // transfert informations to the view
        return $this->render('category/browse.html.twig', [
            'category_list' => $categoryRepository->findAll(),
        ]);
    }

    /**
     * method which read one category
     * 
     * @Route("/read/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read($id, CategoryRepository $categoryRepository): Response
    {
        // transfert informations to the view
        return $this->render('category/read.html.twig', [
            'category' => $categoryRepository->find($id),
        ]);
    }

    /**
     * method which edit one category
     * 
     * @Route("/edit/{id}", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Category $category): Response
    {
        // Create a form for category edition
        $categoryForm = $this->createForm(CategoryType::class, $category);

        // Handle listener for category form
        $categoryForm->handleRequest($request);

        if ($categoryForm->isSubmitted() && $categoryForm->isValid()) {
            // If the form is submitted and valid
            // Use EntityManager
            $entityManager = $this->getDoctrine()->getManager();

            $category->setUpdatedAt(new DateTimeImmutable());

            //EntityManager edit the category object in database
            $entityManager->flush();

            // Post a flash message in the view
            $this->addFlash('success', "The category `{$category->getName()}` is update");

            // Redirection after update
            return $this->redirectToRoute('backoffice_category_browse');
        }

        // Transfert the form to the view
        return $this->render('category/add.edit.html.twig', [
            'category_form' => $categoryForm->createView(),
            'category' => $category,
        ]);
    }

    /**
     * method which add one category
     * 
     * @Route("/add", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request): Response
    {
        $category = new Category();

        // Create a virgin form (because the object is empty)
        $categoryForm = $this->createForm(CategoryType::class, $category);

        // Handle listerner for category form
        $categoryForm->handleRequest($request);

        if ($categoryForm->isSubmitted() && $categoryForm->isValid()) {
            // If the form is submitted and valid
            // Use EntityManager
            $entityManager = $this->getDoctrine()->getManager();
            
            // Persist the new object category
            $entityManager->persist($category);
            //EntityManager edit the category object in database
            $entityManager->flush();

            // Post a flash message in the view
            $this->addFlash('success', "Category `{$category->getName()}` created successfully");

            // redirection
            return $this->redirectToRoute('backoffice_category_browse');
        }

        // Transfert the form to the view
        return $this->render('category/add.edit.html.twig', [
            'category_form' => $categoryForm->createView(),
        ]);
    }

    /**
     * method which delete one category
     * 
     * @Route("/delete/{id}", name="delete", methods={"GET"})
     */
    public function delete(Category $category, EntityManagerInterface $entityManager): Response
    {
        // Post a flash message in the view
        $this->addFlash('success', "category {$category->getId()} delete");

        // Delete the category
        $entityManager->remove($category);
        //EntityManager delete the category object in database
        $entityManager->flush();

        // Redirection after delete
        return $this->redirectToRoute('backoffice_category_browse');
    }
}
