<?php

namespace App\Form;

use App\Entity\PhotoParagraphe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoParagrapheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photographie')
            ->add('miniature')
            ->add('paragraphe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PhotoParagraphe::class,
        ]);
    }
}
