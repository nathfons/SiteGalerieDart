<?php

namespace App\Form;

use App\Entity\Utilisateur;
use App\Entity\TypeUtilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles',ChoiceType::class,[
                'choices'  => [
                    'Admin' => "ROLE_ADMIN",
                    'Artiste' => "ROLE_ARTISTE",
                    'Client' => "ROLE_MULTIPLE",
                
    ],
    'multiple' => true,
    ])
            ->add('password')
            ->add('type', EntityType::class, [
                //choise from entity
                'class'=> TypeUtilisateur::class,
                //User.name property visible
                'choice_label' => 'nomType',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
