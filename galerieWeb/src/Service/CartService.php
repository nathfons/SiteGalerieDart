<?php

namespace App\Service\Cart;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService{


    protected  $session;
    protected $repositoryProduit;

    public function __construct(SessionInterface $session,ProduitRepository $repositoryProduit)
    {
        $this->session = $session;
        $this->repositoryProduit = $repositoryProduit;
    }
    
    public function add(int $id){
        $panier = $this->session->get("panier",[]);
        if(!empty($panier[$id])){
            $panier[$id]=$panier[$id]+1;
        }
        else{
            $panier[$id]=1;
        }
        $this->session->set("panier",$panier);
        dd( $this->session->get("panier"));
    }

    public function remove(int $id){
        $panier = $this->session->get("panier",[]);
        if(!empty($panier[$id])){
            unset($panier[$id]);
        }
        $this->session->set("panier",$panier);
        dd( $this->session->get("panier"));
    }

    public function empty(){

        $this->session->set("panier",[]);
        dd( $this->session->get("panier"));
    }

    public function getFullPanier() : array{
        $panier = $this->session->get("panier",[]);
        $panierAvecDonnees = [];
        foreach($panier as $id => $quantite){
            $panierAvecDonnees[]=[
                "produit" => $this->repositoryProduit->get($id),
                "quantite" => $quantite
            ];
        }
        return $panierAvecDonnees;
    }

    public function getTotal(): float {
        $total = 0;
        $panierAvecDonnees = $this->getFullPanier();
        foreach($panierAvecDonnees as $achat){
            $total = $total + $achat["produit"]->getPrixHT()*$achat["quantite"];
        }
        return $total;
    }
}