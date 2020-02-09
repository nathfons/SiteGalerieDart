<?php

namespace App\Controller;

use App\Entity\PhotoParagraphe;
use App\Form\PhotoParagrapheType;
use App\Repository\PhotoParagrapheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/photo/paragraphe")
 */
class PhotoParagrapheController extends AbstractController
{
    /**
     * @Route("/", name="photo_paragraphe_index", methods={"GET"})
     */
    public function index(PhotoParagrapheRepository $photoParagrapheRepository): Response
    {
        return $this->render('photo_paragraphe/index.html.twig', [
            'photo_paragraphes' => $photoParagrapheRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="photo_paragraphe_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $photoParagraphe = new PhotoParagraphe();
        $form = $this->createForm(PhotoParagrapheType::class, $photoParagraphe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($photoParagraphe);
            $entityManager->flush();

            return $this->redirectToRoute('photo_paragraphe_index');
        }

        return $this->render('photo_paragraphe/new.html.twig', [
            'photo_paragraphe' => $photoParagraphe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photo_paragraphe_show", methods={"GET"})
     */
    public function show(PhotoParagraphe $photoParagraphe): Response
    {
        return $this->render('photo_paragraphe/show.html.twig', [
            'photo_paragraphe' => $photoParagraphe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="photo_paragraphe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PhotoParagraphe $photoParagraphe): Response
    {
        $form = $this->createForm(PhotoParagrapheType::class, $photoParagraphe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('photo_paragraphe_index');
        }

        return $this->render('photo_paragraphe/edit.html.twig', [
            'photo_paragraphe' => $photoParagraphe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photo_paragraphe_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PhotoParagraphe $photoParagraphe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photoParagraphe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($photoParagraphe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('photo_paragraphe_index');
    }
}
