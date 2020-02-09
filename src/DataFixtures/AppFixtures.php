<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\TypePaiement;
use App\Entity\Typelivraison;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $modePaiement = new TypePaiement();
        $modePaiement->setNomtypepaiement("Carte Bleue");
        $manager->persist($modePaiement);

        $modePaiement = new TypePaiement();
        $modePaiement->setNomtypepaiement("PayPal");
        $manager->persist($modePaiement);

        $modeLivraison = new Typelivraison();
        $modeLivraison->setNomtypelivraison("Chronopost");
        $modeLivraison->setPrixlivraison("5.0");
        $modeLivraison->setNomtypelivraison("Chronopost");
        $manager->persist($modeLivraison);

        $modeLivraison = new Typelivraison();
        $modeLivraison->setNomtypelivraison("Courrier suivi");
        $modeLivraison->setPrixlivraison("2.5");
        $manager->persist($modeLivraison);

        $manager->flush();
    }
}
