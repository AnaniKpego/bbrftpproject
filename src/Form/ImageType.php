<?php

namespace App\Form;

use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('path', HiddenType::class,[
                'required'=>false,
                'attr'=>[
                    'class'=>"form-control"
                ]
            ])
            ->add('file',FileType::class,[
                'label'=>"Slectionnez une image",
                'required'=>false,
                'attr'=>[
                    'class'=>"form-control"
                ]
            ])
            ->add('legend',TextType::class,[
                'label'=>"Légende",
                'required'=>false,
                'attr'=>[
                    'class'=>"form-control"
                ]
            ])
            ->add('dataURL', HiddenType::class,[
                'attr'=>[
                    'class'=>"image-data-url"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
        ]);
    }
}
