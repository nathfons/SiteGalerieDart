<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Cadre;
use App\Entity\Categorie;
use App\Entity\Artiste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeProduit')
            ->add('nomProduit')
            ->add('categorie', EntityType::class, [
                //choise from entity
                'class'=> Categorie::class,
                //User.name property visible
                'choice_label' => 'nomcategorie',
            ])
            ->add('artiste', EntityType::class, [
                //choise from entity
                'class'=> Artiste::class,
                //User.name property visible
                'choice_label' => 'nom',
            ])
            ->add('produitoriginal', EntityType::class, [
                //choise from entity
                'class'=> Produit::class,
                //User.name property visible
                'choice_label' => 'produitoriginal',
            ])
            ->add('dateCreation')
            ->add('descriptif')
            ->add('dimension')
            ->add('prixHT')
            ->add('approuve')
            ->add('remise')
            ->add('poids')
            ->add('enVente')
            ->add('enStock')
            ->add('quantiteStocks')
            ->add('quantiteVendue')
            ->add('photographie')
            ->add('miniature')
            ->add('dimensionCadre')
            ->add('cadre', EntityType::class, [
                //choise from entity
                'class'=> Cadre::class,
                //User.name property visible
                'choice_label' => 'nomcadre',
            ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
