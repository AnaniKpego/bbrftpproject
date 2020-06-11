<?php

namespace App\Form;

use App\Entity\Article;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,[
                'label'=>'Titre de l\'article',
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
            ->add('subtitle',CKEditorType::class,[
                'label'=>'Résumé de l\'article ',
                'config_name' => 'my_config',
                'attr'=>[
                    'class' => 'form-control',
                    'rows' => 3,
                    'max' => 200
                ]
            ])
            ->add('imageFile',VichImageType::class,[
                'label'=>'Image',
                'required'=> false,
                'attr'=>[
                    'class'=>'form-control-file'
                ]

            ])
            ->add('description',CKEditorType::class,[
                'label'=>'Description de l\'article',
                'config_name' => 'my_config',
                'attr'=>[
                    'class' => 'form-control',
                    'rows' => 7
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
