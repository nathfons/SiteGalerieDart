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
                'placeholder' => 'obligatoire',
                //'expanded' => true,
                
            ])
            ->add('artiste', EntityType::class, [
                //choise from entity
                'class'=> Artiste::class,
                //User.name property visible
                'choice_label' => 'nom',
                'placeholder' => 'obligatoire',
                //'expanded' => true,
            ])
            ->add('produitoriginal', EntityType::class, [
                'required' => false,
                'placeholder' => 'pour original',

                //choise from entity
                'class'=> Produit::class,
                //User.name property visible
                'choice_label' => function (Produit $produit) {
                   return $produit->getNomProduit();
                },
                'choice_value' => function (Produit $entity = null) {
                    return $entity ? $entity->getId() : '';
                },
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
           
            ->add('cadre', EntityType::class, [
                'required' => false,
                'placeholder' => 'choix cadre',
                
                //choise from entity
                'class'=> Cadre::class,       
                //User.name property visible
                //'choice_label' => 'nomcadre',
                'choice_label' => function (Cadre $cadre) {
                   return $cadre->getNomcadre();
                    //return sprintf('(%d) %s', $cadre->getId(), $cadre->getNomcadre());
                },    
                'choice_value' => function (Cadre $cadre = null) {
                    return $cadre ? $cadre->getId() : '';
                },
                //'expanded' => true,
            ]) 
            
            ->add('dimensionCadre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
