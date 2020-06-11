<?php

namespace App\Form;

use App\Entity\Service;
use App\Entity\Tariff;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,[
                'label'=>'Titre du service',
                'required'=>true,
            ])
            ->add('subtitle', CKEditorType::class,[
                'label'=>'Résumé sur le service',
                'config_name' => 'my_config',
                'required'=>true,
                'attr'=>[
                    'rows'=> 8
                ]
            ])
            ->add('price',MoneyType::class,[
                'label'=>'Prix ordinaire',
                'required'=>true,
            ])
            ->add('icon',TextType::class,[
                'label'=>'Nom icon',
                'required'=>false,
            ])
            ->add('description',CKEditorType::class,[
                'label'=>'Description du service',
                'config_name' => 'my_config',
                'required'=>false,
                'attr'=>[
                    'rows'=> 8
                ]
            ])
            ->add('imageFile',VichImageType::class,[
                'required'=>true,
                'label'=>'Image du service',
                'attr'=>[
                    'class'=>'form-control-file'
                ]
            ])

            ->add('tariffs', EntityType::class, [
                'label' => 'Sélectionner les tarifs *',
                'attr'=>[
                    'class' => 'form-control',
                    'placeholder' => 'Tarifs *'
                ],
                'multiple' => true,
                'required' => true,
                'class' => Tariff::class,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
