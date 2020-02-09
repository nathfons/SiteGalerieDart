<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\Client;
use App\Entity\Typelivraison;
use App\Entity\Typepaiement;
use App\Entity\Adresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CommandeType1 extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_client', ClientType2::class, [
                //choise from entity
                'label' => "Mes données personnelles: ", 
                ])       
           
            ->add('id_adresse', EntityType::class, [
                //choise from entity
                'label' => "Adresse: ",
                'class'=> Adresse::class,
                //User.name property visible
                'choice_label' => 'ville',
                'placeholder' => 'Choisir une adresse de livraison',      
            ])       
          
            ->add('id_typelivraison', EntityType::class, [
                //choise from entity
                'label' => "Type de livraison: ",
                'class'=> Typelivraison::class,
                //User.name property visible 
                'placeholder' => 'Choisir un type de livraison',
                'choice_label' => function (Typelivraison $entity) {
                    return $entity->getNomtypelivraison();
                 },
                 'choice_value' => function (Typelivraison $entity = null) {
                     return $entity ? $entity->getId() : '';
                 },                             
            ])
            ->add('id_typepaiement', EntityType::class, [
                //choise from entity
                'label' => "Type de paiement: ",
                'class' => Typepaiement::class,
                //User.name property visible
                'placeholder' => 'Choisir un type de paiement', 
                'choice_label' => function (Typepaiement $entity) {
                    return $entity->getNomTypepaiement();
                 },
                 'choice_value' => function (Typepaiement $entity = null) {
                     return $entity ? $entity->getId() : '';
                 },                            
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
