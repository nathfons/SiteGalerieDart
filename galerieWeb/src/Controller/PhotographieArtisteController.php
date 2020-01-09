<?php

namespace App\Controller;

use App\Entity\PhotographieArtiste;
use App\Form\PhotographieArtisteType;
use App\Repository\PhotographieArtisteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/photographie/artiste")
 */
class PhotographieArtisteController extends AbstractController
{
    /**
     * @Route("/", name="photographie_artiste_index", methods={"GET"})
     */
    public function index(PhotographieArtisteRepository $photographieArtisteRepository): Response
    {
        return $this->render('photographie_artiste/index.html.twig', [
            'photographie_artistes' => $photographieArtisteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="photographie_artiste_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $photographieArtiste = new PhotographieArtiste();
        $form = $this->createForm(PhotographieArtisteType::class, $photographieArtiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($photographieArtiste);
            $entityManager->flush();

            return $this->redirectToRoute('photographie_artiste_index');
        }

        return $this->render('photographie_artiste/new.html.twig', [
            'photographie_artiste' => $photographieArtiste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photographie_artiste_show", methods={"GET"})
     */
    public function show(PhotographieArtiste $photographieArtiste): Response
    {
        return $this->render('photographie_artiste/show.html.twig', [
            'photographie_artiste' => $photographieArtiste,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="photographie_artiste_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PhotographieArtiste $photographieArtiste): Response
    {
        $form = $this->createForm(PhotographieArtisteType::class, $photographieArtiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('photographie_artiste_index');
        }

        return $this->render('photographie_artiste/edit.html.twig', [
            'photographie_artiste' => $photographieArtiste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photographie_artiste_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PhotographieArtiste $photographieArtiste): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photographieArtiste->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($photographieArtiste);
            $entityManager->flush();
        }

        return $this->redirectToRoute('photographie_artiste_index');
    }
}
