<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produit")
 */
class ProduitController extends AbstractController
{
    private $routeSelected = 'oeuvres_liste';
    private $letterSelected;
    private $InOeuvres = false;

    /**
     * @Route("/", name="produit_index", methods={"GET"})
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/oeuvres/{letter}", name="oeuvres_liste", methods={"GET"})
     */
    public function listeOeuvres($letter,ProduitRepository $produitRepository): Response
    {
        $this->routeSelected="oeuvres_liste";
        $this->letterSelected=$letter;
        $this->InOeuvres=true;
        return $this->render('produit/listeoeuvres.html.twig', [
            //'oeuvres' => $produitRepository->findAllProduitsDeType('Oeuvre'),
            'oeuvres' => $produitRepository->findAll(),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected,
            'titre' => 'Toutes nos Oeuvres',
            'InOeuvres' => true,
        ]);
    }

    

    


    /**
     * @Route("/peintures/{letter}", name="peintures_liste", methods={"GET"})
     */
    public function listePeintures($letter,ProduitRepository $produitRepository): Response
    {
        $this->routeSelected="peintures_liste";
        $this->letterSelected=$letter;
        $this->InOeuvres=true;
        return $this->render('produit/listeoeuvres.html.twig', [
            //'oeuvres' => $produitRepository->findAllProduitsDeType('Oeuvre'),
            'oeuvres' => $produitRepository->findAll(),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected,
            'titre' => 'Nos Peintures',
            'InOeuvres' => true,
        ]);
    }

    /**
     * @Route("/photographies/{letter}", name="photographies_liste", methods={"GET"})
     */
    public function listePhotographies($letter,ProduitRepository $produitRepository): Response
    {
        $this->routeSelected="photographies_liste";
        $this->letterSelected=$letter;
        $this->InOeuvres=true;
        return $this->render('produit/listeoeuvres.html.twig', [
            //'oeuvres' => $produitRepository->findAllProduitsDeType('Oeuvre'),
            'oeuvres' => $produitRepository->findAll(),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected,
            'titre' => 'Nos Photographies',
            'InOeuvres' => true,
        ]);
    }

    /**
     * @Route("/sculptures/{letter}", name="sculptures_liste", methods={"GET"})
     */
    public function listeSculptures($letter,ProduitRepository $produitRepository): Response
    {
        $this->routeSelected="sculptures_liste";
        $this->letterSelected=$letter;
        $this->InOeuvres=true;
        return $this->render('produit/listeoeuvres.html.twig', [
            //'oeuvres' => $produitRepository->findAllProduitsDeType('Oeuvre'),
            'oeuvres' => $produitRepository->findAll(),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected,
            'titre' => 'Nos Sculptures',
            'InOeuvres' => true,
        ]);
    }

    /**
     * @Route("/oeuvres/nouvelles/{letter}", name="nouvelles_oeuvres_liste", methods={"GET"})
     */
    public function listeNouvellesOeuvres($letter,ProduitRepository $produitRepository): Response
    {
        $this->routeSelected="nouvelles_oeuvres_liste";
        $this->letterSelected=$letter;
        $this->inOeuvres = true;
        return $this->render('produit/listeoeuvres.html.twig', [
            'oeuvres' => $produitRepository->findAll(),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected,
            'titre' => 'Nouveautés',
            'InOeuvres' => true,
        ]);
    }

    

    /**
     * @Route("/detailOeuvre/{id}", name="oeuvre_detail", methods={"GET"})
     */
    public function detailOeuvre($id,ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/detailOeuvre.html.twig', [
            'oeuvre' => $produitRepository->find($id),
        ]);
    }
    
    /**
     * @Route("/produits/{letter}", name="produits_liste", methods={"GET"})
     */
    public function listeProduits($letter,ProduitRepository $produitRepository): Response
    {
        $this->routeSelected="produits_liste";
        $this->letterSelected=$letter;
        $this->InOeuvres=false;
        return $this->render('produit/listeproduits.html.twig', [
            'produits' => $produitRepository->findAll(),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected,
            'titre' => 'Tous nos Articles',
            'InOeuvres' => false,
        ]);
    }

 /**
     * @Route("/tshirts/{letter}", name="tshirts_liste", methods={"GET"})
     */
    public function listeTShirts($letter,ProduitRepository $produitRepository): Response
    {
        $this->routeSelected="tshirts_liste";
        $this->letterSelected=$letter;
        $this->InOeuvres=false;
        return $this->render('produit/listeproduits.html.twig', [
            //'oeuvres' => $produitRepository->findAllProduitsDeType('Oeuvre'),
            'oeuvres' => $produitRepository->findAll(),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected,
            'titre' => 'Nos T-Shirts',
            'InOeuvres' => false,
        ]);
    }

    /**
     * @Route("/posters/{letter}", name="posters_liste", methods={"GET"})
     */
    public function listePosters($letter,ProduitRepository $produitRepository): Response
    {
        $this->routeSelected="posters_liste";
        $this->letterSelected=$letter;
        $this->InOeuvres=false;
        return $this->render('produit/listeproduits.html.twig', [
            //'oeuvres' => $produitRepository->findAllProduitsDeType('Oeuvre'),
            'oeuvres' => $produitRepository->findAll(),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected,
            'titre' => 'Nos Posters',
            'InOeuvres' => false,
        ]);
    }

    /**
     * @Route("/cartespostales/{letter}", name="cartes_postales_liste", methods={"GET"})
     */
    public function listeCartesPostales($letter,ProduitRepository $produitRepository): Response
    {
        $this->routeSelected="cartes_postales_liste";
        $this->letterSelected=$letter;
        $this->InOeuvres=false;
        return $this->render('produit/listeproduits.html.twig', [
            //'oeuvres' => $produitRepository->findAllProduitsDeType('Oeuvre'),
            'oeuvres' => $produitRepository->findAll(),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected,
            'titre' => 'Nos Cartes Postales',
            'InOeuvres' => false,
        ]);
    }

    /**
     * @Route("/nouveaux/{letter}", name="nouveaux_articles_liste", methods={"GET"})
     */
    public function listeNouveauxProduits($letter,ProduitRepository $produitRepository): Response
    {
        $this->routeSelected="nouveaux_articles_liste";
        $this->letterSelected=$letter;
        $this->InOeuvres=false;
        return $this->render('produit/listeproduits.html.twig', [
            //'oeuvres' => $produitRepository->findAllProduitsDeType('Oeuvre'),
            'oeuvres' => $produitRepository->findAll(),
            'routeSelected'=> $this->routeSelected,
            'letterSelected'=> $this->letterSelected,
            'titre' => 'Nouveaux Articles à la Vente',
            'InOeuvres' => false,
        ]);
    }

    /**
     * @Route("/detailProduit/{id}", name="produit_detail", methods={"GET"})
     */
    public function detailProduit($id,ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/detailProduit.html.twig', [
            'produit' => $produitRepository->find($id),
        ]);
    }

    /**
     * @Route("/new", name="produit_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('produit_index');
        }

        return $this->render('produit/new.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produit_show", methods={"GET"})
     */
    public function show(Produit $produit): Response
    {
        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="produit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Produit $produit): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produit_index');
        }

        return $this->render('produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produit_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Produit $produit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produit_index');
    }

    /**
     * @Route("/{id}/approve", name="produit_approve", methods={"APPROVE"})
     */
    public function approve(Request $request, Produit $produit, ProduitRepository $produitRepository): Response
    {
        if ($this->isCsrfTokenValid('approve'.$produit->getId(), $request->request->get('_token'))) {
            $produitId = $produit->getId();
            $produitRepository->approveProduit($produitId);

   
        }

        return $this->redirectToRoute('admin_oeuvres');
    }

    

    //update
    public function update($id)
{
    $entityManager = $this->getDoctrine()->getManager();
    $product = $entityManager->getRepository(Produit::class)->find($id);
 
    if (!$product) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }
 
    $product->setName('New product name!');
    $entityManager->flush();
 
    return $this->redirectToRoute('product_show', [
        'id' => $product->getId()
    ]);
}
    
}
