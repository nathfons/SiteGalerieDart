<?php

namespace App\Form;

use App\Entity\Cadre;
use App\Entity\Couleur;
use App\Entity\Matiere;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CadreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomcadre')
            ->add('imagecadre')
            ->add('prixCadreUniteHt')
            ->add('couleur', EntityType::class, [
                //choise from entity
                'class'=> Couleur::class,
                //User.name property visible
                'choice_label' => 'nomcouleur',
            ])
            ->add('matiere', EntityType::class, [
                //choise from entity
                'class'=> Matiere::class,
                //User.name property visible
                'choice_label' => 'nommatiere',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cadre::class,
        ]);
    }
}
