<?php

namespace App\Form;

use App\Entity\RoomCategory;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label'=> 'Nom de la catégorie'
            ])
            ->add('description', CKEditorType::class,[
                'label'=>'Description de la catégorie',
                'config_name' => 'my_config',
                'attr'=>[
                    'class' => 'form-control',
                    'rows' => 10,
                ]
            ])
            ->add('rooms')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RoomCategory::class,
        ]);
    }
}
