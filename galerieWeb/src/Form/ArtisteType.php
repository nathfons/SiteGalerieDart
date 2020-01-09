<?php

namespace App\Form;

use App\Entity\Artiste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtisteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('biography')
            ->add('approuve')
            ->add('photographie')
            ->add('miniature')
            ->add('commission')
            ->add('alaune')
            ->add('textAlaune')
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('dateCreationCompte')
            ->add('idUtilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Artiste::class,
        ]);
    }
}
