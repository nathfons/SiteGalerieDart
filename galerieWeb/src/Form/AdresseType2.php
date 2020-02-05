<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Adresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AdresseType2 extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ville')
            ->add('codePostal')
            ->add('rueEtNumero')
            ->add('id_client', EntityType::class, [
                //choise from entity
                'class'=> Client::class,
                //User.name property visible
                'choice_label' => 'nom',
                'placeholder' => 'obligatoire',               
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}
