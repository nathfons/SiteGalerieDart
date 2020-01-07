<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MenuOeuvreController extends AbstractController
{
    /**
     * @Route("/menu/oeuvre", name="menu_oeuvre")
     */
    public function index()
    {
        return $this->render('menu_oeuvre/index.html.twig', [
            'controller_name' => 'MenuOeuvreController',
        ]);
    }
}
