<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Paragraphe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('publie', CheckboxType::class, array('required' => false)) 
            ->add('datePublication')
            ->add('dateFinPublication')
            ->add('photoTitre')
            ->add('paragraphes', CollectionType::class, array(
                'entry_type'   => ParagrapheType::class,
                'allow_add'    => true,
                'allow_delete' => true
              ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
