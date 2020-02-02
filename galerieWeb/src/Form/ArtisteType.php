<?php

namespace App\Form;

use App\Entity\Artiste;
use App\Entity\Utilisateur;
use App\Entity\CategorieArtiste;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
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
            ->add('categories', EntityType::class, [
                //choise from entity
                'required' => true,
                'placeholder' => 'Catégorie',
                'class'=> CategorieArtiste::class,
                'choice_label' => 'nom',
                 'multiple' => true,   
                 'expanded'=>true
                
            ])
            ->add('commission')
            ->add('alaune')
            ->add('textAlaune', TextareaType::class)
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('dateCreationCompte')
            ->add('utilisateur', EntityType::class, [
                //choise from entity
                'class'=> Utilisateur::class,
                //User.name property visible
                'choice_label' => 'email',
                'required' => true,
                'placeholder' => 'Choix artiste',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Artiste::class,
        ]);
    }
}
