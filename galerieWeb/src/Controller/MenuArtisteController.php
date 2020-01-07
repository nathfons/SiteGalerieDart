<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MenuArtisteController extends AbstractController
{
    /**
     * @Route("/menu/artiste", name="menu_artiste")
     */
    public function index()
    {
        return $this->render('menu_artiste/index.html.twig', [
            'controller_name' => 'MenuArtisteController',
        ]);
    }
}
