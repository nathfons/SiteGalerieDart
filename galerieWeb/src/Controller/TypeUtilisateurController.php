<?php

namespace App\Controller;

use App\Entity\TypeUtilisateur;
use App\Form\TypeUtilisateurType;
use App\Repository\TypeUtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/utilisateur")
 */
class TypeUtilisateurController extends AbstractController
{
    /**
     * @Route("/", name="type_utilisateur_index", methods={"GET"})
     */
    public function index(TypeUtilisateurRepository $typeUtilisateurRepository): Response
    {
        return $this->render('type_utilisateur/index.html.twig', [
            'type_utilisateurs' => $typeUtilisateurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_utilisateur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeUtilisateur = new TypeUtilisateur();
        $form = $this->createForm(TypeUtilisateurType::class, $typeUtilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeUtilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('type_utilisateur_index');
        }

        return $this->render('type_utilisateur/new.html.twig', [
            'type_utilisateur' => $typeUtilisateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_utilisateur_show", methods={"GET"})
     */
    public function show(TypeUtilisateur $typeUtilisateur): Response
    {
        return $this->render('type_utilisateur/show.html.twig', [
            'type_utilisateur' => $typeUtilisateur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_utilisateur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeUtilisateur $typeUtilisateur): Response
    {
        $form = $this->createForm(TypeUtilisateurType::class, $typeUtilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_utilisateur_index');
        }

        return $this->render('type_utilisateur/edit.html.twig', [
            'type_utilisateur' => $typeUtilisateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_utilisateur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeUtilisateur $typeUtilisateur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeUtilisateur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeUtilisateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_utilisateur_index');
    }
}
