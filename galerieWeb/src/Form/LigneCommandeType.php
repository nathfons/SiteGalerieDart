<?php

namespace App\Form;

use App\Entity\LigneCommande;
use App\Entity\Produit;
use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LigneCommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantiteProduit')
            ->add('prixUnite')
           
            ->add('idProduit', EntityType::class, [
                //choise from entity
                'class'=> Produit::class,
                //User.name property visible
                'choice_label' => 'nomProduit',
                'placeholder' => 'obligatoire',               
            ])       
           
            ->add('idCommande', EntityType::class, [
                //choise from entity
                'class'=> Commande::class,
                //User.name property visible
                'choice_label' => 'referencecommande',
                'placeholder' => 'obligatoire',               
            ])       
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LigneCommande::class,
        ]);
    }
}
