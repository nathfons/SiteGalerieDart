<?php

namespace App\Controller;

use App\Entity\Typelivraison;
use App\Form\TypelivraisonType;
use App\Repository\TypelivraisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typelivraison")
 */
class TypelivraisonController extends AbstractController
{
    /**
     * @Route("/", name="typelivraison_index", methods={"GET"})
     */
    public function index(TypelivraisonRepository $typelivraisonRepository): Response
    {
        return $this->render('typelivraison/index.html.twig', [
            'typelivraisons' => $typelivraisonRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typelivraison_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typelivraison = new Typelivraison();
        $form = $this->createForm(TypelivraisonType::class, $typelivraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typelivraison);
            $entityManager->flush();

            return $this->redirectToRoute('typelivraison_index');
        }

        return $this->render('typelivraison/new.html.twig', [
            'typelivraison' => $typelivraison,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typelivraison_show", methods={"GET"})
     */
    public function show(Typelivraison $typelivraison): Response
    {
        return $this->render('typelivraison/show.html.twig', [
            'typelivraison' => $typelivraison,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="typelivraison_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typelivraison $typelivraison): Response
    {
        $form = $this->createForm(TypelivraisonType::class, $typelivraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typelivraison_index');
        }

        return $this->render('typelivraison/edit.html.twig', [
            'typelivraison' => $typelivraison,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typelivraison_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Typelivraison $typelivraison): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typelivraison->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typelivraison);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typelivraison_index');
    }
}
