<?php

namespace App\Form;

use App\Entity\Adresse;
use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
                'placeholder' => 'Choix client',
            ])
            ->add('adresse', EntityType::class, [
                //choise from entity
                'class'=> Adresse::class,
                //User.name property visible
                'required' => true,
                'placeholder' => 'Choix adresse',
                'choice_label' => function (Adresse $entity) {
                    return $entity->getVille();
                 },
                 'choice_value' => function (Adresse $entity = null) {
                     return $entity ? $entity->getId() : '';
                 },                             
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
