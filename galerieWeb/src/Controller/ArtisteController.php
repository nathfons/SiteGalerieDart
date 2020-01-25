<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Form\ArtisteType;
use App\Repository\ArtisteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/artiste")
 */
class ArtisteController extends AbstractController
{

    private $routeSelected="artistes_liste";
    private $letterSelected = "*";

    /**
     * @Route("/", name="artiste_index", methods={"GET"})
     */
    public function index(ArtisteRepository $artisteRepository): Response
    {
        return $this->render('artiste/index.html.twig', [
            'artistes' => $artisteRepository->findAll(),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected
        ]);
    }

    /**
     * @Route("/artistes/{letter}", name="artistes_liste", methods={"GET"})
     */
    public function liste($letter,ArtisteRepository $artisteRepository): Response
    {
        $this->routeSelected="artistes_liste";
        $this->letterSelected=$letter;
        return $this->render('artiste/liste.html.twig', [
            'artistes' => $artisteRepository->findByFirstLetter($letter),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected
        ]);
    }

    /**
     * @Route("/peintres/{letter}", name="peintres_liste", methods={"GET"})
     */
    public function listePeintres($letter,ArtisteRepository $artisteRepository): Response
    {
        $this->routeSelected="peintres_liste";
        $this->letterSelected=$letter;
        return $this->render('artiste/liste.html.twig', [
            'artistes' => $artisteRepository->findByCategorieArtiste('Peintre',$letter),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected
        ]);
    }

    /**
     * @Route("/photographes/{letter}", name="photographes_liste", methods={"GET"})
     */
    public function listePhotographes($letter,ArtisteRepository $artisteRepository): Response
    {
        $this->routeSelected="photographes_liste";
        $this->letterSelected=$letter;
        return $this->render('artiste/liste.html.twig', [
            'artistes' => $artisteRepository->findByCategorieArtiste('Photographe',$letter),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected
        ]);
    }

    /**
     * @Route("/sculpteurs/{letter}", name="sculpteurs_liste", methods={"GET"})
     */
    public function listeSculpteurs($letter,ArtisteRepository $artisteRepository): Response
    {
        $this->routeSelected="sculpteurs_liste";
        $this->letterSelected=$letter;
        return $this->render('artiste/liste.html.twig', [
            'artistes' => $artisteRepository->findByCategorieArtiste('Sculpteur',$letter),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected
        ]);
    }

    /**
     * @Route("/nouveaux/{letter}", name="nouveaux_liste", methods={"GET"})
     */
    public function listeNouveauxArtistes($letter,ArtisteRepository $artisteRepository): Response
    {
        $this->routeSelected="nouveaux_liste";
        $this->letterSelected=$letter;
        return $this->render('artiste/liste.html.twig', [
            'artistes' => $artisteRepository->findNouveauxArtistes($letter),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected
        ]);
    }

    /**
     * @Route("/artiste/{id}", name="artiste_detail", methods={"GET"})
     */
    public function artiste($id,ArtisteRepository $artisteRepository): Response
    {
        return $this->render('artiste/detail.html.twig', [
            'artiste' => $artisteRepository->find($id),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected
        ]);
    }

    /**
     * @Route("/new", name="artiste_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $artiste = new Artiste();
        $form = $this->createForm(ArtisteType::class, $artiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($artiste);
            $entityManager->flush();

            return $this->redirectToRoute('artiste_index');
        }

        return $this->render('artiste/new.html.twig', [
            'artiste' => $artiste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="artiste_show", methods={"GET"})
     */
    public function show(Artiste $artiste): Response
    {
        return $this->render('artiste/show.html.twig', [
            'artiste' => $artiste,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="artiste_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Artiste $artiste): Response
    {
        $form = $this->createForm(ArtisteType::class, $artiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('artiste_index');
        }

        return $this->render('artiste/edit.html.twig', [
            'artiste' => $artiste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="artiste_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Artiste $artiste): Response
    {
        if ($this->isCsrfTokenValid('delete'.$artiste->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($artiste);
            $entityManager->flush();
        }

        return $this->redirectToRoute('artiste_index');
    }
}
