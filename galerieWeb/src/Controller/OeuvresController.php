<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OeuvresController extends AbstractController
{
    /**
     * @Route("/oeuvres", name="oeuvres")
     */
    public function index()
    {
        return $this->render('oeuvres/index.html.twig', [
            'controller_name' => 'OeuvresController',
        ]);
    }
}
