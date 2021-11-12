<?php

namespace App\Controller;

use App\Entity\Anecdote;
use App\Form\AnecdoteType;
use App\Repository\AnecdoteRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/backoffice/anecdote", name="backoffice_anecdote_")
 * @IsGranted("ROLE_ADMIN")
 */
class AnecdoteController extends AbstractController
{
    /**
     * Method which list anecdotes.
     * 
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(AnecdoteRepository $anecdoteRepository): Response
    {
        //transfert informations to the view
        return $this->render('anecdote/browse.html.twig', [
            'anecdote_list' => $anecdoteRepository->findAll(),
        ]);
    }

    /**
     * Method which read one anecdote.
     * 
     * @Route("/read/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read($id, AnecdoteRepository $anecdoteRepository): Response
    {
        //transfert informations to the view
        return $this->render('anecdote/read.html.twig', [
            'anecdote' => $anecdoteRepository->find($id),
        ]);
    }

    /**
     * Method which edit one anecdote.
     * 
     * @Route("/edit/{id}", name="edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Anecdote $anecdote): Response
    {
        //create a form for anecdote edition
        $anecdoteForm = $this->createForm(AnecdoteType::class, $anecdote);

        //handle listener for anecdote form
        $anecdoteForm->handleRequest($request);

        if ($anecdoteForm->isSubmitted() && $anecdoteForm->isValid()) {
            //if the form is submitted and valid
            //use EntityManager
            $entityManager = $this->getDoctrine()->getManager();

            $anecdote->setUpdatedAt(new DateTimeImmutable());

            //if the new anecdote haven't description when the submit
            if($anecdote->getDescription() == null){

                //get the content of the new anecdote.
                $anecdoteContent = $anecdote->getContent();
                //set the beginning of the anecdote content to description
                $anecdote->setDescription(substr($anecdoteContent, 0, 50));
            }
            
            //EntityManager edit the anecdote object in database
            $entityManager->flush();

            //post a flash message in the view
            $this->addFlash('success', "The anecdote `{$anecdote->getTitle()}` is update");

            //redirection after update
            return $this->redirectToRoute('backoffice_anecdote_browse');
        }

        //transfert the form to the view
        return $this->render('anecdote/add.edit.html.twig', [
            'anecdote_form' => $anecdoteForm->createView(),
            'anecdote' => $anecdote,
        ]);
    }

    /**
     * Method which add one anecdote.
     * 
     * @Route("/add", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request): Response
    {
        $anecdote = new Anecdote();

        //create a virgin form (because the object is empty)
        $anecdoteForm = $this->createForm(AnecdoteType::class, $anecdote);

        //handle listerner for anecdote form
        $anecdoteForm->handleRequest($request);

        if ($anecdoteForm->isSubmitted() && $anecdoteForm->isValid()) {
            //if the form is submitted and valid
            //use EntityManager
            $entityManager = $this->getDoctrine()->getManager();
            
            //persist the new object anecdote
            $entityManager->persist($anecdote);

            //if the new anecdote haven't description when the submit
            if($anecdote->getDescription() == null){

                //get the content of the new anecdote
                $anecdoteContent = $anecdote->getContent();
                //set the beginning of the anecdote content to description
                $anecdote->setDescription(substr($anecdoteContent, 0, 50));
            }
            
            //EntityManager edit the anecdote object in database
            $entityManager->flush();

            //post a flash message in the view
            $this->addFlash('success', "Anecdote `{$anecdote->getTitle()}` created successfully");

            //redirection
            return $this->redirectToRoute('backoffice_anecdote_browse');
        }

        //transfert the form to the view
        return $this->render('anecdote/add.edit.html.twig', [
            'anecdote_form' => $anecdoteForm->createView(),
        ]);
    }

    /**
     * Method which delete one anecdote.
     * 
     * @Route("/delete/{id}", name="delete", methods={"GET", "DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Anecdote $anecdote, EntityManagerInterface $entityManager): Response
    {
        //post a flash message in the view
        $this->addFlash('success', "anecdote {$anecdote->getId()} deleted successfully");

        //delete the anecdote
        $entityManager->remove($anecdote);
        //EntityManager delete the anecdote object in database
        $entityManager->flush();

        //redirection after delete
        return $this->redirectToRoute('backoffice_anecdote_browse');
    }
}
