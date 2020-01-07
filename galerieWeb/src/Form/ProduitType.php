<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeProduit')
            ->add('nomProduit')
            ->add('dateCreation')
            ->add('descriptif')
            ->add('dimension')
            ->add('cadre')
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
            ->add('artiste')
            ->add('idProduit')
            ->add('idCadre')
            ->add('idCategorie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
