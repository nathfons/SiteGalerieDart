<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CadreRepository;
use App\Repository\ProduitRepository;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(ProduitRepository $produitRepository, CadreRepository $cadreRepository)
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'main'=>'Accueil', 
            'cadre'=>'Cadre',
            'cadres' => $cadreRepository->findAll(),
            'produitsNonApprouves' => $produitRepository->findByApprouve("false"),
            'oeuvresNonApprouves' => $produitRepository->findByOeuvresApprouve("false"),
            'produits' => $produitRepository->findAll(),
        ]);
    }
    
}
