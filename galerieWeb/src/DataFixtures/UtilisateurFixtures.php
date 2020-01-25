<?php

namespace App\DataFixtures;

use App\Entity\TypeUtilisateur;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UtilisateurFixtures extends Fixture
{
    private  $encoder;


    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $utilisateur = new Utilisateur();
        $utilisateur->setEmail ( "toto@gmail.com");
        $type = new TypeUtilisateur();
        $type->setNomType("Client");
        $utilisateur->setType($type) ;
        $plainPassword = 'toto';
        $encoded = $this->encoder->encodePassword($utilisateur, $plainPassword);
        $utilisateur->setPassword($encoded);
        $manager->persist($type);
        $manager->persist($utilisateur);
        $utilisateur = new Utilisateur();
        $utilisateur->setEmail ( "titi@gmail.com");
        $type = new TypeUtilisateur();
        $type->setNomType("Client");
        $utilisateur->setType($type) ;
        $plainPassword = 'titi';
        $encoded = $this->encoder->encodePassword($utilisateur, $plainPassword);
        $utilisateur->setPassword($encoded);
        $manager->persist($type);
        $manager->persist($utilisateur);
        $utilisateur->setEmail ( "giacometti@gmail.com");
        $type = new TypeUtilisateur();
        $type->setNomType("Artiste");
        $utilisateur->setType($type) ;
        $plainPassword = 'giacometti';
        $encoded = $this->encoder->encodePassword($utilisateur, $plainPassword);
        $utilisateur->setPassword($encoded);
        $manager->persist($type);
        $manager->persist($utilisateur);
        $manager->flush();
    }
}
