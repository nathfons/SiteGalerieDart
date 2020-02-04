<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\TypeUtilisateur;
use App\Entity\Utilisateur;
use App\Entity\CategorieArtiste;
use App\Entity\Categorie;
use App\Entity\Artiste;
use App\Entity\Produit;
use App\Entity\Cadre;
use App\Entity\Couleur;
use App\Entity\Matiere;
use App\Constants\BDDconstants;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;

class ArtisteFixtures extends Fixture
{ private  $encoder;


    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $package = new Package(new EmptyVersionStrategy());

    $categoriesArtistes=[];
    $categorie= new CategorieArtiste();
    $categorie->setNom(BDDconstants::CATEGORIE_Sculpteur);
    $categoriesArtistes[] = $categorie;
    $manager->persist($categorie);
    $categorie= new CategorieArtiste();
    $categorie->setNom(BDDconstants::CATEGORIE_Peintre);
    $categoriesArtistes[] = $categorie;
    $manager->persist($categorie);
    $categorie= new CategorieArtiste();
    $categorie->setNom(BDDconstants::CATEGORIE_Photographe);
    $categoriesArtistes[] = $categorie;
    $manager->persist($categorie);

    $categoriesOeuvres=[];
    $categorieSculpture = new Categorie();
    $categorieSculpture->setNomcategorie(BDDconstants::CATEGORIE_Sculpture);
    $categoriesOeuvres[] = $categorieSculpture;
    $manager->persist($categorieSculpture);
    $categoriePeinture= new Categorie();
    $categoriePeinture->setNomcategorie(BDDconstants::CATEGORIE_Peinture);
    $categoriesOeuvres[] = $categoriePeinture;
    $manager->persist($categoriePeinture);
    $categoriePhoto= new Categorie();
    $categoriePhoto->setNomcategorie(BDDconstants::CATEGORIE_Photographie);
    $categoriesOeuvres[] = $categoriePhoto;
    $manager->persist($categoriePhoto);

    $categoriesProduits=[];
    $categorieTshirt= new Categorie();
    $categorieTshirt->setNomcategorie(BDDconstants::CATEGORIE_Tshirt);
    $categoriesProduits[] = $categorieTshirt;
    $manager->persist($categorieTshirt);
    $categoriePoster= new Categorie();
    $categoriePoster->setNomcategorie(BDDconstants::CATEGORIE_Poster);
    $categoriesProduits[] = $categoriePoster;
    $manager->persist($categoriePoster);
    $categorieCartes= new Categorie();
    $categorieCartes->setNomcategorie(BDDconstants::CATEGORIE_CartesPostales);
    $categoriesProduits[] = $categorieCartes;
    $manager->persist($categorieCartes);

    $peinturesMini=[];
    $peinturesMini[]="build/images/Alberto_Sanchez_De_un_punto_mini.jpg";
    $peinturesMini[]="build/images/angel_ferrant_mini.jpg";
    $peinturesMini[]="build/images/eurgal_paysage_marin_mini.jpg";
    $peinturesMini[]="build/images/eurgal-_mini.jpg";
    $peinturesMini[]="build/images/eurgal-2_mini.jpg";
    $peinturesMini[]="build/images/eurgal-3_mini.jpg";
    $peinturesMini[]="build/images/eurgal-4_mini.jpg";
    $peinturesMini[]="build/images/eurgal-5_mini.jpg";
    $peinturesMini[]="build/images/gaugin_mini.jpg";
    $peinturesMini[]="build/images/giacometti_mini.jpg";
    $peinturesMini[]="build/images/Jacques_Lipchitz_1918_Guitariste_mini.jpg";
    $peinturesMini[]="build/images/julio-golzalez_mini.jpg";
    $peinturesMini[]="build/images/miquel_barcelo_pinassi_mini.jpg";
    $peinturesMini[]="build/images/paul-henry_turn-of-the-road_mini.jpg";
    $peinturesMini[]="build/images/rafael-ruiz-balerdi_mini.jpg";
    $peinturesMini[]="build/images/soulage_mini.jpg";
    $peintures=[];
    $peintures[]="build/images/Alberto_Sanchez_De_un_punto.jpg";
    $peintures[]="build/images/angel_ferrant.jpg";
    $peintures[]="build/images/eurgal_paysage_marin.jpg";
    $peintures[]="build/images/eurgal-.jpg";
    $peintures[]="build/images/eurgal-2.jpg";
    $peintures[]="build/images/eurgal-3.jpg";
    $peintures[]="build/images/eurgal-4.jpg";
    $peintures[]="build/images/eurgal-5.jpg";
    $peintures[]="build/images/gaugin.jpg";
    $peintures[]="build/images/giacometti.jpg";
    $peintures[]="build/images/Jacques_Lipchitz_1918_Guitariste.jpg";
    $peintures[]="build/images/julio-golzalez.jpg";
    $peintures[]="build/images/miquel_barcelo_pinassi.jpg";
    $peintures[]="build/images/paul-henry_turn-of-the-road.jpg";
    $peintures[]="build/images/rafael-ruiz-balerdi.jpg";
    $peintures[]="build/images/soulage.jpg";
    $typesProduit=[];
    $typesProduit[]=BDDconstants::TYPEPRODUIT_Oeuvre;
    $typesProduit[]=BDDconstants::TYPEPRODUIT_ArticlesEnVente;
    
    
    $couleurs=[];
    $couleur= new Couleur();
    $couleur->setNomcouleur("gris");
    $couleur->getCodeHexadecimal("#56739A");
    $couleurs[]=$couleur;
    $manager->persist($couleur);
    $couleur= new Couleur();
    $couleur->setNomcouleur("beige");
    $couleur->getCodeHexadecimal("#56739A");
    $couleurs[]=$couleur;
    $manager->persist($couleur);
    $couleur= new Couleur();
    $couleur->setNomcouleur("noir");
    $couleur->getCodeHexadecimal("#56739A");
    $couleurs[]=$couleur;
    $manager->persist($couleur);
    $couleur= new Couleur();
    $couleur->setNomcouleur("bleu");
    $couleur->getCodeHexadecimal("#56739A");
    $couleurs[]=$couleur;
    $manager->persist($couleur);
    
    $bois = new Matiere();
    $metal = new Matiere();

    $cadres=[];
    $cadre = new Cadre();
    //$cadre->set

    
    
    $artisteAlaune = [];
    $artisteAlaune[] =TRUE;
    $artisteAlaune[] =FALSE;
    $type = new TypeUtilisateur();
    $type->setNomType("ADMIN");
    $manager->persist($type);
    $type = new TypeUtilisateur();
    $type->setNomType("CLIENT");
    //$manager->persist($type);//DEJA CREE DANS UTILISATEUR
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
         $manager->persist($utilisateur);
        
        
        $artiste = new Artiste(); 
        $artiste->setNom($faker->lastName);
        $artiste->setPrenom($faker->firstName);
        $artiste->setBiography($faker->text);
        $artiste->setApprouve(false);
        $artiste->setPhotographie($faker->randomElement($peintures));//random pic url à mettre
        $artiste->setMiniature($faker->randomElement($peinturesMini));
        $artiste->addCategory($faker->randomElement($categoriesArtistes));
        $artiste->setCommission(20);
        $artiste->setAlaune($faker->randomElement($artisteAlaune));
        $artiste->setTextAlaune($faker->text);
        $artiste->setTelephone("0671398765");
        $artiste->setDateCreationCompte($faker->dateTime($max = 'now', $timezone = null));
        $artiste->setUtilisateur($utilisateur);
        
        $manager->persist($artiste);

        for($k=1;$k<=10;$k++){
            $oeuvre = new Produit();
            $oeuvre->setTypeProduit(BDDconstants::TYPEPRODUIT_Oeuvre);
            $oeuvre->setNomProduit($faker->word);
            $oeuvre->setDateCreation($faker->dateTime($max = 'now', $timezone = null));
            $oeuvre->setDescriptif($faker->text);
            $oeuvre->setDimension('150*300*10');
            $oeuvre->setPrixHT($faker->numberBetween(500,5000));
            $oeuvre->setApprouve(TRUE);
            $oeuvre->setRemise(0);
            $oeuvre->setPoids($faker->numberBetween(2,20));
            $oeuvre->setEnVente(TRUE);
            $oeuvre->setEnStock(TRUE);
            $oeuvre->setQuantiteStocks(1);
            $oeuvre->setQuantiteVendue(0);
            $oeuvre->setPhotographie($faker->randomElement($peintures));
            $oeuvre->setMiniature($faker->randomElement($peinturesMini));
            $oeuvre->setArtiste($artiste);
            $oeuvre->setCategorie($faker->randomElement($categoriesOeuvres));

            
            $manager->persist($oeuvre);

            $produit = new Produit();
            $produit->setTypeProduit(BDDconstants::TYPEPRODUIT_ArticlesEnVente);
            $produit->setNomProduit($faker->word);
            $produit->setDateCreation($faker->dateTime($max = 'now', $timezone = null));
            $produit->setDescriptif($faker->text);
            $produit->setDimension('150*300*10');
            $produit->setPrixHT($faker->numberBetween(50,100));
            $produit->setApprouve(TRUE);
            $produit->setRemise(0);
            $produit->setPoids($faker->numberBetween(2,20));
            $produit->setEnVente(TRUE);
            $produit->setEnStock(TRUE);
            $produit->setQuantiteStocks(1);
            $produit->setQuantiteVendue(0);
            $produit->setPhotographie("build/images/tshirt.jpg");
            $produit->setMiniature("build/images/tshirt.jpg");
            $produit->setArtiste($artiste);
            $produit->setProduitoriginal($oeuvre);
            $produit->setCategorie($categorieTshirt);

            $manager->persist($produit);

            $produit = new Produit();
            $produit->setTypeProduit(BDDconstants::TYPEPRODUIT_ArticlesEnVente);
            $produit->setNomProduit($faker->word);
            $produit->setDateCreation($faker->dateTime($max = 'now', $timezone = null));
            $produit->setDescriptif($faker->text);
            $produit->setDimension('150*300*10');
            $produit->setPrixHT(25);
            $produit->setApprouve(TRUE);
            $produit->setRemise(0);
            $produit->setPoids($faker->numberBetween(2,20));
            $produit->setEnVente(TRUE);
            $produit->setEnStock(TRUE);
            $produit->setQuantiteStocks(1);
            $produit->setQuantiteVendue(0);
            $produit->setPhotographie("build/images/postcard.jpg");
            $produit->setMiniature("build/images/postcard.jpg");
            $produit->setArtiste($artiste);
            $produit->setProduitoriginal($oeuvre);
            $produit->setCategorie($categorieCartes);

            $manager->persist($produit);

            $produit = new Produit();
            $produit->setTypeProduit(BDDconstants::TYPEPRODUIT_ArticlesEnVente);
            $produit->setNomProduit($faker->word);
            $produit->setDateCreation($faker->dateTime($max = 'now', $timezone = null));
            $produit->setDescriptif($faker->text);
            $produit->setDimension('150*300*10');
            $produit->setPrixHT($faker->numberBetween(100,250));
            $produit->setApprouve(TRUE);
            $produit->setRemise(0);
            $produit->setPoids($faker->numberBetween(2,20));
            $produit->setEnVente(TRUE);
            $produit->setEnStock(TRUE);
            $produit->setQuantiteStocks(1);
            $produit->setQuantiteVendue(0);
            $produit->setPhotographie($oeuvre->getPhotographie());
            $produit->setMiniature($oeuvre->getMiniature());
            $produit->setArtiste($artiste);
            $produit->setProduitoriginal($oeuvre);
            $produit->setCategorie($categoriePoster);

            $manager->persist($produit);
        }
        $manager->persist($artiste);

        
    }

    $manager->flush();
    }
}
