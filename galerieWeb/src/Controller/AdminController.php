<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CadreRepository;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(CadreRepository $cadreRepository)
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'main'=>'Accueil','cadre'=>'Cadre',
            'cadres' => $cadreRepository->findAll(),
        ]);
    }
    
}
