<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ArtisteRepository;
use App\Repository\CommandeRepository;
use App\Repository\ProduitRepository;
use App\Repository\LigneCommandeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Produit;
use App\Entity\Artiste;
use App\Form\ArtisteType;
use App\Form\ArtisteType2;
use Symfony\Component\Form\Util\OrderedHashMap;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    //private $routeSelected="admin";
    //private $qte = 0;
    //private $cmd = "no";

    /**
     * @Route("/", name="admin")
     */
    public function index(ProduitRepository $produitRepository, ArtisteRepository $artisteRepository, CommandeRepository $commandeRepository, LigneCommandeRepository $ligneCommandeRepository)
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'new_artistes' => $artisteRepository->findCntNewArtistes(),
            'produitsNonApprouves' => $produitRepository->findByApprouve("false"),
            'oeuvresNonApprouves' => $produitRepository->findByOeuvresApprouve(),
            'produits' => $produitRepository->findAll(),
            'nbCommandesEnCours' => $commandeRepository->nbCommandesEnCours(),
            'sommeVentes' => $ligneCommandeRepository->sommeVentes(),
            'nbOeuvresApprouve' => $produitRepository->nbOeuvresApprouve(),
            'nbProduitsApprouve' => $produitRepository->nbProduitsApprouve(),
            'articlesVente' => $ligneCommandeRepository->findAll(),
            
        ]);
    }
    
    /**
     * @Route("/admin_oeuvres", name="admin_oeuvres")
     */
    public function findOeuvres(CommandeRepository $commandeRepository, ProduitRepository $produitRepository, LigneCommandeRepository $ligneCommandeRepository, ArtisteRepository $artisteRepository): Response
    {
        return $this->render('admin/admin_oeuvres.html.twig', [
            'oeuvresNonApprouves' => $produitRepository->findByOeuvresApprouve(),
            'new_artistes' => $artisteRepository->findCntNewArtistes(),
            'nbCommandesEnCours' => $commandeRepository->nbCommandesEnCours(),
            'nbOeuvresApprouve' => $produitRepository->nbOeuvresApprouve(),
            'nbProduitsApprouve' => $produitRepository->nbProduitsApprouve(),
            'sommeVentes' => $ligneCommandeRepository->sommeVentes(),
        ]);
    }  
    /**
     * @Route("/admin_produits", name="admin_produits")
     */
    public function findProduits(CommandeRepository $commandeRepository, ProduitRepository $produitRepository, LigneCommandeRepository $ligneCommandeRepository, ArtisteRepository $artisteRepository): Response
    {
        return $this->render('admin/admin_produits.html.twig', [
            'produitsNonApprouves' => $produitRepository->findByApprouve("false"),
            'new_artistes' => $artisteRepository->findCntNewArtistes(),
            'nbCommandesEnCours' => $commandeRepository->nbCommandesEnCours(),
            'nbOeuvresApprouve' => $produitRepository->nbOeuvresApprouve(),
            'nbProduitsApprouve' => $produitRepository->nbProduitsApprouve(),
            'sommeVentes' => $ligneCommandeRepository->sommeVentes(),
        ]);
    }  
    /**
     * @Route("/admin_ventes", name="admin_ventes")
     */
    public function articlesVente(ProduitRepository $produitRepository, CommandeRepository $commandeRepository, LigneCommandeRepository $ligneCommandeRepository, ArtisteRepository $artisteRepository): Response
    {
        //dd($ligneCommandeRepository->sommeVentes());
        return $this->render('admin/admin_ventes.html.twig', [
            'produitsNonApprouves' => $produitRepository->findByApprouve("false"),
            'articlesVente' => $ligneCommandeRepository->findAll(),
            'new_artistes' => $artisteRepository->findCntNewArtistes(),
            'nbCommandesEnCours' => $commandeRepository->nbCommandesEnCours(),
            'nbOeuvresApprouve' => $produitRepository->nbOeuvresApprouve(),
            'nbProduitsApprouve' => $produitRepository->nbProduitsApprouve(),
            'sommeVentes' => $ligneCommandeRepository->sommeVentes()
        ]);
    }  
    /**
     * @Route("/admin_vente_produits", name="admin_vente_produits")
     */
    public function findProduitsVente(ProduitRepository $produitRepository, CommandeRepository $commandeRepository, ArtisteRepository $artisteRepository, LigneCommandeRepository $ligneCommandeRepository): Response
    {
       //dump($produitRepository->findAll()); 
      
        return $this->render('admin/admin_ventes.html.twig', [
            'produitsVente' => $ligneCommandeRepository->findAll(),
            'articlesVente' => $ligneCommandeRepository->findAll(),
            'new_artistes' => $artisteRepository->findCntNewArtistes(),
            'nbCommandesEnCours' => $commandeRepository->nbCommandesEnCours(),
            'nbOeuvresApprouve' => $produitRepository->nbOeuvresApprouve(),
            'nbProduitsApprouve' => $produitRepository->nbProduitsApprouve(),
            'sommeVentes' => $ligneCommandeRepository->sommeVentes(),
            'cmd'=> 'no',

        ]);
    }  

     /**
     * @Route("/admin_stock_produits", name="admin_stock_produits")
     */
    public function findProduitsStock(ArtisteRepository $artisteRepository, CommandeRepository $commandeRepository, LigneCommandeRepository $ligneCommandeRepository, ProduitRepository $produitRepository): Response
    {
       //$this->routeSelected="admin_stock_produits";
        //$this->qte=$qte;

        return $this->render('admin/admin_stock_produits.html.twig', [
            'stockProduits' => $produitRepository->stockProduits(),
            'stockProduits_enVente' => $produitRepository->stockProduits_enVente(),    
            'nbOeuvresApprouve' => $produitRepository->nbOeuvresApprouve(),
            'nbProduitsApprouve' => $produitRepository->nbProduitsApprouve(),
            'new_artistes' => $artisteRepository->findCntNewArtistes(),
            'nbCommandesEnCours' => $commandeRepository->nbCommandesEnCours(),
            'sommeVentes' => $ligneCommandeRepository->sommeVentes(),
            'cmd'=> 'no',
            
            //'routeSelected'=> $this->routeSelected,
        ]);
    }  

    //fonction appliquée dans controller avec EM
    /**
     * @Route("/stock/{id}", name="commander_stock", methods={"GET", "POST"})
     */
    public function commander_stock(Request $request, Produit $produit): Response
    {

            // dd($produit->getId());
            //$produitId=$produit->getId();
            $produitStock=$produit->getQuantiteStocks();
            $qte = $request->get("qte_cmd");
            //$produitRepository->commanderStock($produitId, $produitStock, $qte);
           $produit->setQuantiteStocks($produitStock+$qte);

            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();
            
        return $this->redirectToRoute('admin_stock_produits');
    }

    /**
     * @Route("/artistes", name="approuver_alaune", methods={"POST"})
     */
    public function approuver_alaune(Request $request, ArtisteRepository $artisteRepository): Response
    {
            //dd($request->request->get("approuver_alaune_name"));
            //if GET
          //  $artiste_id_result = $request->get("id");

            $approuver_alaune_name = $request->request->get("approuver_alaune_name");
            if($approuver_alaune_name != null){    
            $artiste_id_result=str_split($approuver_alaune_name)[0];
            //$artiste_alaune_result=str_split($approuver_alaune_name)[2];  
            //$artisteRepository->setAlaune($artiste_alaune_result);
           // $entityManager = $this->getDoctrine()->getManager();
           // $entityManager->persist($artiste);
           // $entityManager->flush();
           $artisteRepository->setAlauneResult($artiste_id_result);

        return $this->redirectToRoute('admin_artistes_alaune');

        }

    }

    /**
     * @Route("/artistes", name="effacer_alaune", methods={"POST"})
     */
    public function effacer_alaune(Request $request, ArtisteRepository $artisteRepository)
    {
            
  
        
          $artisteRepository->effacerAlauneResult();
                     

            
        return $this->redirectToRoute('admin_artistes_alaune');

    }


    /**
     * @Route("/admin_artistes", name="admin_artistes")
     */
    public function findArtistes(ProduitRepository $produitRepository, CommandeRepository $commandeRepository, LigneCommandeRepository $ligneCommandeRepository, ArtisteRepository $artisteRepository): Response
    {
        //dd($artisteRepository->findArtistesNouveaux());//findArtistesPublies
        //$routeSelected = "admin_artistes";
        return $this->render('admin/admin_artistes.html.twig', [
            'artistesPublies' => $artisteRepository->findArtistesPublies(),
            'artistesNouveaux' => $artisteRepository->findArtistesNouveaux(),
            'new_artistes' => $artisteRepository->findCntNewArtistes(),
            'nbCommandesEnCours' => $commandeRepository->nbCommandesEnCours(),
            'nbOeuvresApprouve' => $produitRepository->nbOeuvresApprouve(),
            'nbProduitsApprouve' => $produitRepository->nbProduitsApprouve(),
            'sommeVentes' => $ligneCommandeRepository->sommeVentes(),
            //'routeSelected'=> $this->routeSelected,
            
        ]);
        }

    
    /**
     * @Route("/admin_artistes_alaune", name="admin_artistes_alaune")
     * @Route("/admin_artistes_alaune/{id}/{alaune}", name="admin_artistes_alaune_update")
     */
    public function findArtistesAlaune(ProduitRepository $produitRepository,Request $request, CommandeRepository $commandeRepository, LigneCommandeRepository $ligneCommandeRepository, ArtisteRepository $artisteRepository): Response
    {
        //dd($artisteRepository->findArtistesNouveaux());//findArtistesPublies
        //$routeSelected = "admin_artistes";
        $artistes = $artisteRepository->findAll();
        //$forms =  new OrderedHashMap();
        $numItems = $artisteRepository->cntArtistes();
        foreach($artistes as $index =>$artiste){
            $formArtiste = $this->createForm(ArtisteType2::class, $artiste);
            $formArtiste->handleRequest($request);
            $forms[$artiste->getId()] = $formArtiste->createView();
      
            if($index == $numItems){
             
            }
            
        }
        
        if ($formArtiste->isSubmitted() && $formArtiste->isValid()) {
            //dump($request->get('alaune'));
            if(($request->request->get('id')!=null)&&($request->request->get('alaune')!=null)){
                $artistes->get($request->request->get('id'))-setAlaune($request->request->get('alaune'));
                $this->getDoctrine()->getManager()->flush($artistes->get($request->request->get('id')));     

            }
        }   

        return $this->render('admin/admin_artistes_alaune.html.twig', [
           
            'artistesAlaune' => $artistes,
            'new_artistes' => $artisteRepository->findCntNewArtistes(),
            'nbCommandesEnCours' => $commandeRepository->nbCommandesEnCours(),
            'nbOeuvresApprouve' => $produitRepository->nbOeuvresApprouve(),
            'nbProduitsApprouve' => $produitRepository->nbProduitsApprouve(),
            'sommeVentes' => $ligneCommandeRepository->sommeVentes(),
            //'routeSelected'=> $this->routeSelected,9
            //'forms' =>$forms ,

        ]);
    }

    /**
     * @Route("/admin_artistes_alaune/{id}", name="form_artistes_alaune", methods={"GET","POST"})
     * 
     */
    public function formArtistesAlaune($id,Request $request, Artiste $artiste, ArtisteRepository $artisteRepository): Response
    {
        //$entityManager = $this->getDoctrine()->getManager();
       // $artisteAlaune = $artisteRepository->find($id);

       
        $form = $this->createForm(ArtisteType2::class, $artiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_artistes');
        }

        return $this->render('admin/admin_artistes.html.twig', [
            'artiste' =>  $artiste,
            'form' => $form->createView(),

        ]);
    }




    /**
     * @Route("/admin_commandes", name="admin_commandes")
     */
    public function findCommandesEnCours(ProduitRepository $produitRepository, CommandeRepository $commandeRepository, LigneCommandeRepository $ligneCommandeRepository, ArtisteRepository $artisteRepository): Response
    {
        //dump($commandeRepository->allCommandesEncours());//findCommandesEnCours
        //$routeSelected = "admin_commandes";
        return $this->render('admin/admin_commandes.html.twig', [
            'allCommandesEncours' => $commandeRepository->allCommandesEncours(),
            'allCommandesLivraison' => $commandeRepository->allCommandesLivraison(),
            'allCommandesRetournees' => $commandeRepository->allCommandesRetournees(),
            'allCommandesLivrees' => $commandeRepository->allCommandesLivrees(),
            'nbCommandesEnCours' => $commandeRepository->nbCommandesEnCours(),
            'new_artistes' => $artisteRepository->findCntNewArtistes(),
            'nbCommandesEnCours' => $commandeRepository->nbCommandesEnCours(),
            'nbOeuvresApprouve' => $produitRepository->nbOeuvresApprouve(),
            'nbProduitsApprouve' => $produitRepository->nbProduitsApprouve(),
            'sommeVentes' => $ligneCommandeRepository->sommeVentes(),
            //'routeSelected'=> $this->routeSelected,
            
        ]);
        }
    
}
