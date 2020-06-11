<?php

namespace App\Form;

use App\Entity\Slidelayer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SlidelayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,[
                'label'=>'Titre du slide layer',
                'required'=>true,
            ])
            ->add('class',TextType::class,[
                'label'=>'class du slide layer',
                'required'=>true
                ,])
            ->add('dataX',TextType::class,[
                'label'=>'Donnée X',
                'required'=>true,
                ])
            ->add('dataHoffset',TextType::class,[
                'label'=>'Titre du slide layer',
                'required'=>true,
                ])
            ->add('dataY',IntegerType::class,[
                'label'=>'Donnée Y',
                'required'=>true
            ])
            ->add('dataVoffset',IntegerType::class,[
                'label'=>'Donnée V-offset',
                'required'=>true
            ])
            ->add('dataResponsiveOffset',IntegerType::class,[
                'label'=>'Donnée Responsive Offset',
                'required'=>true,
                ])
            ->add('dataWhitespace',TextType::class,[
                'label'=>'Donnée avec espace',
                'required'=>true,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Slidelayer::class,
        ]);
    }
}
