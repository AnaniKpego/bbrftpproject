<?php

namespace App\Form;

use App\Entity\Restaurant;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RestaurantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label'=>'Titre',
                'required'=>true
            ])
            ->add('price', MoneyType::class,[
                'label'=>'Prix',
                'required'=>true
            ])
            ->add('subtitle', CKEditorType::class,[
                'label'=>'Sous-titre',
                'config_name' => 'my_config',
                'required'=>true,
                'attr'=>[
                    'rows'=> 8
                ]
            ])
            ->add('description',CKEditorType::class,[
                'label'=>'Description',
                'config_name' => 'my_config',

            ])
            ->add('imageFile',VichImageType::class,[
                'label' => 'Image',
                'required'=>false,
                'attr'=>[
                    'class'=>'form-control-file'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Restaurant::class,
        ]);
    }
}
