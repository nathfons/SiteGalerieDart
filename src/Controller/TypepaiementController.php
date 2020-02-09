<?php

namespace App\Controller;

use App\Entity\Typepaiement;
use App\Form\TypepaiementType;
use App\Repository\TypepaiementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typepaiement")
 */
class TypepaiementController extends AbstractController
{
    /**
     * @Route("/", name="typepaiement_index", methods={"GET"})
     */
    public function index(TypepaiementRepository $typepaiementRepository): Response
    {
        return $this->render('typepaiement/index.html.twig', [
            'typepaiements' => $typepaiementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typepaiement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typepaiement = new Typepaiement();
        $form = $this->createForm(TypepaiementType::class, $typepaiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typepaiement);
            $entityManager->flush();

            return $this->redirectToRoute('typepaiement_index');
        }

        return $this->render('typepaiement/new.html.twig', [
            'typepaiement' => $typepaiement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typepaiement_show", methods={"GET"})
     */
    public function show(Typepaiement $typepaiement): Response
    {
        return $this->render('typepaiement/show.html.twig', [
            'typepaiement' => $typepaiement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="typepaiement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typepaiement $typepaiement): Response
    {
        $form = $this->createForm(TypepaiementType::class, $typepaiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typepaiement_index');
        }

        return $this->render('typepaiement/edit.html.twig', [
            'typepaiement' => $typepaiement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typepaiement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Typepaiement $typepaiement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typepaiement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typepaiement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typepaiement_index');
    }
}
