<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CadreRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Produit;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    private $routeSelected="admin";
    private $qte = 0;
    private $cmd = "no";

    /**
     * @Route("/", name="admin")
     */
    public function index(ProduitRepository $produitRepository, CadreRepository $cadreRepository)
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'main'=>'Accueil', 
            'cadre'=>'Cadre',
            'cadres' => $cadreRepository->findAll(),
            'produitsNonApprouves' => $produitRepository->findByApprouve("false"),
            'oeuvresNonApprouves' => $produitRepository->findByOeuvresApprouve(),
            'produits' => $produitRepository->findAll(),
            'oeuvresVente' => $produitRepository->findVenteOeuvres(),
            'produitsVente' => $produitRepository->findVenteProduits(),
        ]);
    }
    
    /**
     * @Route("/admin_oeuvres", name="admin_oeuvres")
     */
    public function findOeuvres(ProduitRepository $produitRepository): Response
    {
        return $this->render('admin/admin_oeuvres.html.twig', [
            'oeuvresNonApprouves' => $produitRepository->findByOeuvresApprouve(),
        ]);
    }  
    /**
     * @Route("/admin_produits", name="admin_produits")
     */
    public function findProduits(ProduitRepository $produitRepository): Response
    {
        return $this->render('admin/admin_produits.html.twig', [
            'produitsNonApprouves' => $produitRepository->findByApprouve("false"),
        ]);
    }  
    /**
     * @Route("/admin_vente_oeuvres", name="admin_vente_oeuvres")
     */
    public function findOeuvresVente(ProduitRepository $produitRepository): Response
    {
        return $this->render('admin/admin_vente_oeuvres.html.twig', [
            'oeuvresVente' => $produitRepository->findVenteOeuvres(),
        ]);
    }  
    /**
     * @Route("/admin_vente_produits", name="admin_vente_produits")
     */
    public function findProduitsVente(ProduitRepository $produitRepository): Response
    {

       
        //$this->routeSelected="admin_vente_produits";
        //$this->qte=$qte;

        return $this->render('admin/admin_vente_produits.html.twig', [
            'produitsVente' => $produitRepository->findVenteProduits(),
            'qte'=> 4,//$this->qte,
            'cmd'=> 'no',
            //'routeSelected'=> $this->routeSelected,
        ]);
    }  

        /**
     * @Route("/stock/{id}", name="commander_stock", methods={"GET", "POST"})
     */
    public function commander_stock(Request $request, Produit $produit, ProduitRepository $produitRepository): Response
    {
        //dans template
        //action="{{ path('commander_stock') }}" method="POST"

       // $requete = $this->get('request');
         // je vérifie si elle est de type POSt 
        //if($requete->getMethod() == 'POST')
        //{ 
        //    $pass = $_POST['adresse']; //////Comme PHP
        //    $adr = $_POST['pass'];   // COMME PHP
       // } 

      // dd($produit->getId());
            $produitId=$produit->getId();
            $produitStock=$produit->getQuantiteStocks();
            $qte = $request->get("qte_cmd");
            $produitRepository->commanderStock($produitId, $produitStock, $qte);
            //$this->qteSelected=$qte;
           
            //->set('p.quantiteStocks', $produitStock+$qte)
       

        return $this->redirectToRoute('admin_vente_produits');
    }

}
