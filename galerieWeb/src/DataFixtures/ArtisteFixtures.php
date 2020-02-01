<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\TypeUtilisateur;
use App\Entity\Utilisateur;
use App\Entity\CategorieArtiste;
use App\Entity\Artiste;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class ArtisteFixtures extends Fixture
{ private  $encoder;


    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
    $categoriesArtistes=[];
    $categorie= new CategorieArtiste();
    $categorie->setNom("Sculpteur");
    $categoriesArtistes[] = $categorie;
    $manager->persist($categorie);
    $categorie= new CategorieArtiste();
    $categorie->setNom("Photographe");
    $categoriesArtistes[] = $categorie;
    $manager->persist($categorie);
    $categorie= new CategorieArtiste();
    $categorie->setNom("Peintre");
    $categoriesArtistes[] = $categorie;
    $manager->persist($categorie);
    
    $artisteAlaune = [];
    $artisteAlaune[] =TRUE;
    $artisteAlaune[] =FALSE;
    $type = new TypeUtilisateur();
    $type->setNomType("ADMIN");
    $manager->persist($type);
    $type = new TypeUtilisateur();
    $type->setNomType("CLIENT");
    $manager->persist($type);
    $typeArtiste = new TypeUtilisateur();
    $typeArtiste->setNomType("ARTISTE");
    $idType=$manager->persist($typeArtiste);
    $faker = Faker\Factory::create();
    
    for($j=1;$j<=20;$j++){
        $idCategorie = $faker->numberBetween(0,2);
        $utilisateur = new Utilisateur();
        $utilisateur->setEmail ($faker->email);
        $utilisateur->setType($typeArtiste) ;
        $plainPassword = 'artiste';
        $encoded = $this->encoder->encodePassword($utilisateur, $plainPassword);
        $utilisateur->setPassword($encoded);
        $idUtilisateur = $manager->persist($utilisateur);
        
        
        $artiste = new Artiste(); 
        $artiste->setNom($faker->lastName);
        $artiste->setPrenom($faker->firstName);
        $artiste->setBiography($faker->text);
        $artiste->setApprouve(false);
        $artiste->setPhotographie('http://lorempixel.com/1200/500/');//random pic url à mettre
        $artiste->setMiniature('http://lorempixel.com/200/200/');
        $artiste->addCategory($faker->randomElement($categoriesArtistes));
        $artiste->setCommission(20);
        $artiste->setAlaune($faker->randomElement($artisteAlaune));
        $artiste->setTextAlaune($faker->text);
        $artiste->setTelephone("0671398765");
        $artiste->setDateCreationCompte($faker->dateTime($max = 'now', $timezone = null));
        $artiste->setUtilisateur($idUtilisateur);
        $manager->persist($artiste);
    }

    $manager->flush();
    }
}
