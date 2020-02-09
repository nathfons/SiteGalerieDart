<?php

namespace App\Form;

use App\Entity\Artiste;
use App\Entity\Utilisateur;
use App\Entity\CategorieArtiste;
use Doctrine\DBAL\Types\TextType;
use App\Form\ArtisteType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ArtistesListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('artistes', CollectionType::class, array(
                'entry_type'   => ArtisteType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype' => true,
                'entry_options' => ['label' => false,
                    'attr' => ['class' => Artiste::class],
                ],
              ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Artiste::class,
        ]);
    }
}
