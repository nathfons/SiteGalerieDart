<?php

namespace App\Controller;
use App\Repository\ProduitRepository;
use App\Repository\ArticleRepository;
use App\Repository\ArtisteRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(ProduitRepository $produitRepository,ArtisteRepositoy $artisteRepository,ArticleRepository $articleRepository)
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'artistes'=> $artisteRepository-> findByArtistesAlaune(),
            'produits'=> $produitRepository->findMostSold(),
            'articles'=> $articleRepository->findMostRecents()
        ]);
    }
}
