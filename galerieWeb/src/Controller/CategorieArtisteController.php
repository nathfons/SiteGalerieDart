<?php

namespace App\Controller;

use App\Entity\CategorieArtiste;
use App\Form\CategorieArtisteType;
use App\Repository\CategorieArtisteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categorie/artiste")
 */
class CategorieArtisteController extends AbstractController
{
    /**
     * @Route("/", name="categorie_artiste_index", methods={"GET"})
     */
    public function index(CategorieArtisteRepository $categorieArtisteRepository): Response
    {
        return $this->render('categorie_artiste/index.html.twig', [
            'categorie_artistes' => $categorieArtisteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="categorie_artiste_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categorieArtiste = new CategorieArtiste();
        $form = $this->createForm(CategorieArtisteType::class, $categorieArtiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorieArtiste);
            $entityManager->flush();

            return $this->redirectToRoute('categorie_artiste_index');
        }

        return $this->render('categorie_artiste/new.html.twig', [
            'categorie_artiste' => $categorieArtiste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_artiste_show", methods={"GET"})
     */
    public function show(CategorieArtiste $categorieArtiste): Response
    {
        return $this->render('categorie_artiste/show.html.twig', [
            'categorie_artiste' => $categorieArtiste,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categorie_artiste_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategorieArtiste $categorieArtiste): Response
    {
        $form = $this->createForm(CategorieArtisteType::class, $categorieArtiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorie_artiste_index');
        }

        return $this->render('categorie_artiste/edit.html.twig', [
            'categorie_artiste' => $categorieArtiste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_artiste_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CategorieArtiste $categorieArtiste): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieArtiste->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categorieArtiste);
            $entityManager->flush();
        }

        return $this->redirectToRoute('categorie_artiste_index');
    }
}
