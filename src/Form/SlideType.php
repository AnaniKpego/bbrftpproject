<?php

namespace App\Form;

use App\Entity\Slide;
use App\Entity\Slidelayer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SlideType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,[
                'label'=>'Titre du slide',
                'required'=>true,
            ])
            ->add('imageFile',VichImageType::class,[
                'label' => 'Image',
                'required'=>true
            ])
            ->add('slidelayer',EntityType::class, [
                'label' => 'Textes de slide',
                'attr'=>[
                    'class' => 'form-control',
                ],
                'multiple' => true,
                'required' => true,
                'class' => Slidelayer::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Slide::class,
        ]);
    }
}
