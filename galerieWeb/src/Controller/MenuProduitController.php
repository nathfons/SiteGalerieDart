<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MenuProduitController extends AbstractController
{
    /**
     * @Route("/menu/produit", name="menu_produit")
     */
    public function index()
    {
        return $this->render('menu_produit/index.html.twig', [
            'controller_name' => 'MenuProduitController',
        ]);
    }
}
