<?php

namespace App\Controller;

use App\Entity\Cadre;
use App\Form\CadreType;
use App\Repository\CadreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cadre")
 */
class CadreController extends AbstractController
{
    /**
     * @Route("/", name="cadre_index", methods={"GET"})
     */
    public function index(CadreRepository $cadreRepository): Response
    {
        return $this->render('cadre/index.html.twig', [
            'cadres' => $cadreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cadre_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cadre = new Cadre();
        $form = $this->createForm(CadreType::class, $cadre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cadre);
            $entityManager->flush();

            return $this->redirectToRoute('cadre_index');
        }

        return $this->render('cadre/new.html.twig', [
            'cadre' => $cadre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cadre_show", methods={"GET"})
     */
    public function show(Cadre $cadre): Response
    {
        return $this->render('cadre/show.html.twig', [
            'cadre' => $cadre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cadre_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cadre $cadre): Response
    {
        $form = $this->createForm(CadreType::class, $cadre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cadre_index');
        }

        return $this->render('cadre/edit.html.twig', [
            'cadre' => $cadre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cadre_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Cadre $cadre): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cadre->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cadre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cadre_index');
    }
}
