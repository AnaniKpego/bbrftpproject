<?php

namespace App\Form;

use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', VichImageType::class,[
                'label'=>"Télécharger une image *",
                'required'=>true,
                'attr'=>[
                    'class'=>"form-control"
                ]
            ])
            ->add('title', TextType::class,[
                'label'=>"Titre *",
                'required'=>true,
                'attr'=>[
                    'class'=>"form-control"
                ]
            ])
            ->add('legend',TextType::class,[
                'label'=>"Légende",
                'attr'=>[
                    'class'=>"form-control"
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
