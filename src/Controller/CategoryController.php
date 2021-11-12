<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/backoffice/category", name="backoffice_category_")
 * @IsGranted("ROLE_ADMIN")
 */
class CategoryController extends AbstractController
{
    /**
     * Function which list categories.
     * 
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(CategoryRepository $categoryRepository): Response
    {
        //transfert informations to the view
        return $this->render('category/browse.html.twig', [
            'category_list' => $categoryRepository->findAll(),
        ]);
    }

    /**
     * Method which read one category.
     * 
     * @Route("/read/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read($id, CategoryRepository $categoryRepository): Response
    {
        //transfert informations to the view
        return $this->render('category/read.html.twig', [
            'category' => $categoryRepository->find($id),
        ]);
    }

    /**
     * Method which edit one category.
     * 
     * @Route("/edit/{id}", name="edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Category $category,SluggerInterface $slugger ): Response
    {

        //create a form for category edition
        $categoryForm = $this->createForm(CategoryType::class, $category);

        //handle listener for category form
        $categoryForm->handleRequest($request);

        if ($categoryForm->isSubmitted() && $categoryForm->isValid()) {
            //if the form is submitted and valid
            //use EntityManager
            $entityManager = $this->getDoctrine()->getManager();

            $category->setUpdatedAt(new DateTimeImmutable());

            //get category name
            $categoryName = $category->getName();
            //slug categoryName
            $categoryNameSlug = $slugger->slug(strtolower($categoryName));
            //set the slug property of the category object
            $category->setSlug($categoryNameSlug);

            //EntityManager edit the category object in database
            $entityManager->flush();

            //post a flash message in the view
            $this->addFlash('success', "The category `{$category->getName()}` is update");

            //redirection after update
            return $this->redirectToRoute('backoffice_category_browse');
        }

        //transfert the form to the view
        return $this->render('category/add.edit.html.twig', [
            'category_form' => $categoryForm->createView(),
            'category' => $category,
        ]);
    }

    /**
     * Method which add one category.
     * 
     * @Route("/add", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request, SluggerInterface $slugger): Response
    {
        $category = new Category();

        //create a virgin form (because the object is empty)
        $categoryForm = $this->createForm(CategoryType::class, $category);

        //handle listerner for category form
        $categoryForm->handleRequest($request);

        if ($categoryForm->isSubmitted() && $categoryForm->isValid()) {
            //if the form is submitted and valid
            //use EntityManager
            $entityManager = $this->getDoctrine()->getManager();

            //get category name
            $categoryName = $category->getName();
            //slug categoryName
            $categoryNameSlug = $slugger->slug(strtolower($categoryName));
            //set the slug property of the category object
            $categorySlug = $category->setSlug($categoryNameSlug);

            //persist the new object category
            $entityManager->persist($category);
            //EntityManager edit the category object in database
            $entityManager->flush();

            //post a flash message in the view
            $this->addFlash('success', "Category `{$category->getName()}` created successfully");

            //redirection
            return $this->redirectToRoute('backoffice_category_browse');
        }

        //transfert the form to the view
        return $this->render('category/add.edit.html.twig', [
            'category_form' => $categoryForm->createView(),
        ]);
    }

    /**
     * Method which delete one category.
     * 
     * @Route("/delete/{id}", name="delete", methods={"GET", "DELETE"},requirements={"id"="\d+"})
     */
    public function delete(Category $category, EntityManagerInterface $entityManager): Response
    {
        //post a flash message in the view
        $this->addFlash('success', "category {$category->getId()} delete");

        //delete the category
        $entityManager->remove($category);
        //EntityManager delete the category object in database
        $entityManager->flush();

        //redirection after delete
        return $this->redirectToRoute('backoffice_category_browse');
    }
}
