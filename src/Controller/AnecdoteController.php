<?php

namespace App\Controller;

use App\Entity\Anecdote;
use App\Form\AnecdoteType;
use App\Repository\AnecdoteRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/backoffice/anecdote", name="backoffice_anecdote_")
 */
class AnecdoteController extends AbstractController
{
    /**
     * method which list anecdotes
     * 
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(AnecdoteRepository $anecdoteRepository): Response
    {
        // transfert informations to the view
        return $this->render('anecdote/browse.html.twig', [
            'anecdote_list' => $anecdoteRepository->findAll(),
        ]);
    }

    /**
     * method which read one anecdote
     * 
     * @Route("/read/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read($id, AnecdoteRepository $anecdoteRepository): Response
    {
        // transfert informations to the view
        return $this->render('anecdote/read.html.twig', [
            'anecdote' => $anecdoteRepository->find($id),
        ]);
    }

    /**
     * method which edit one anecdote
     * 
     * @Route("/edit/{id}", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Anecdote $anecdote): Response
    {
        // Create a form for anecdote edition
        $anecdoteForm = $this->createForm(AnecdoteType::class, $anecdote);

        // Handle listener for anecdote form
        $anecdoteForm->handleRequest($request);

        if ($anecdoteForm->isSubmitted() && $anecdoteForm->isValid()) {
            // If the form is submitted and valid
            // Use EntityManager
            $entityManager = $this->getDoctrine()->getManager();

            $anecdote->setUpdatedAt(new DateTimeImmutable());

            //if the new anecdote haven't description when the submit.
            if($anecdote->getDescription() == null){

                //Get the content of the new anecdote.
                $anecdoteContent = $anecdote->getContent();
                //Set the beginning of the anecdote content to description.
                $anecdote->setDescription(substr($anecdoteContent, 0, 50));
            }
            
            //EntityManager edit the anecdote object in database
            $entityManager->flush();

            // Post a flash message in the view
            $this->addFlash('success', "The anecdote `{$anecdote->getTitle()}` is update");

            // Redirection after update
            return $this->redirectToRoute('backoffice_anecdote_browse');
        }

        // Transfert the form to the view
        return $this->render('anecdote/add.edit.html.twig', [
            'anecdote_form' => $anecdoteForm->createView(),
            'anecdote' => $anecdote,
        ]);
    }

    /**
     * method which add one anecdote
     * 
     * @Route("/add", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request): Response
    {
        $anecdote = new Anecdote();

        // Create a virgin form (because the object is empty)
        $anecdoteForm = $this->createForm(AnecdoteType::class, $anecdote);

        // Handle listerner for anecdote form
        $anecdoteForm->handleRequest($request);

        if ($anecdoteForm->isSubmitted() && $anecdoteForm->isValid()) {
            // If the form is submitted and valid
            // Use EntityManager
            $entityManager = $this->getDoctrine()->getManager();
            
            // Persist the new object anecdote
            $entityManager->persist($anecdote);

            //if the new anecdote haven't description when the submit.
            if($anecdote->getDescription() == null){

                //Get the content of the new anecdote.
                $anecdoteContent = $anecdote->getContent();
                //Set the beginning of the anecdote content to description.
                $anecdote->setDescription(substr($anecdoteContent, 0, 50));
            }
            
            //EntityManager edit the anecdote object in database
            $entityManager->flush();

            // Post a flash message in the view
            $this->addFlash('success', "Anecdote `{$anecdote->getTitle()}` created successfully");

            // redirection
            return $this->redirectToRoute('backoffice_anecdote_browse');
        }

        // Transfert the form to the view
        return $this->render('anecdote/add.edit.html.twig', [
            'anecdote_form' => $anecdoteForm->createView(),
        ]);
    }

    /**
     * method which delete one anecdotev
     * 
     * @Route("/delete/{id}", name="delete", methods={"GET"})
     */
    public function delete(Anecdote $anecdote, EntityManagerInterface $entityManager): Response
    {
        // Post a flash message in the view
        $this->addFlash('success', "anecdote {$anecdote->getId()} deleted successfully");

        // Delete the anecdote
        $entityManager->remove($anecdote);
        //EntityManager delete the anecdote object in database
        $entityManager->flush();

        // Redirection after delete
        return $this->redirectToRoute('backoffice_anecdote_browse');
    }
}
