<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Service\Cart\CartService;
use App\Service\Panier\PanierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(PanierService $service)
    {
        $panierAvecDonnees = $service->getFullPanier();
        $total = $service->getTotal();
        
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'achats' => $panierAvecDonnees,
            'total' => $total
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="panierAdd")
     */
    function add($id,PanierService $service): Response{
        $service->add($id);
        return $this->redirectToRoute("panier");
    }

    /**
     * @Route("/panier/remove/", name="panierRemove")
     */
    function remove($id,PanierService $service): Response{
        $service->remove($id);
        return $this->redirectToRoute("panier");
    }

    /**
     * @Route("/panier/empty/", name="panierEmpty")
     */
    function empty($id,PanierService $service): Response{
        $service->empty();
        return $this->redirectToRoute("panier");
    }
}
