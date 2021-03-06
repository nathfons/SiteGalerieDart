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

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('referencecommande')
            
            ->add('etatcommande',ChoiceType::class,[
                'choices'  => [
                    'commandée' => "enCours",   
                    'livraison' => "livraison",
                    'livrée' => "livree",
                    'retournée' => "retournee",
                ],
                'multiple' => false,
                'required' => true,
                
            ])
            ->add('datecommande')
            ->add('datelivraison')
            
            ->add('id_adresse', EntityType::class, [
                //choise from entity
                'class'=> Adresse::class,
                //User.name property visible
                'choice_label' => 'ville',
                'placeholder' => 'obligatoire',               
            ])       
          
            ->add('id_typelivraison', EntityType::class, [
                //choise from entity
                'class'=> Typelivraison::class,
                //User.name property visible 
                'placeholder' => 'obligatoire',
                'choice_label' => function (Typelivraison $entity) {
                    return $entity->getNomtypelivraison();
                 },
                 'choice_value' => function (Typelivraison $entity = null) {
                     return $entity ? $entity->getId() : '';
                 },                             
            ])
            ->add('id_typepaiement', EntityType::class, [
                //choise from entity
                'class'=> Typepaiement::class,
                //User.name property visible
                'placeholder' => 'obligatoire', 
                'choice_label' => function (Typepaiement $entity) {
                    return $entity->getNomTypepaiement();
                 },
                 'choice_value' => function (Typepaiement $entity = null) {
                     return $entity ? $entity->getId() : '';
                 },                            
            ])
            ->add('id_client', EntityType::class, [
                //choise from entity
                'class'=> Client::class,
                //User.name property visible
                'placeholder' => 'obligatoire', 
                'choice_label' => function (Client $entity) {
                    return $entity->getNom();
                 },
                 'choice_value' => function (Client $entity = null) {
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
