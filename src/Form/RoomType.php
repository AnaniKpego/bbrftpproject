<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\Room;
use App\Entity\RoomEquipment;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label'=>"Nom de la chambre",
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
            ->add('summary',CKEditorType::class,[
                'label'=>"Resumé de la chambre",
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
            ->add('description',CKEditorType::class,[
                'label'=>"Description de la chambre",
                'attr'=>[
                    'class' => 'form-control',
                    'rows' => 10
                ]
            ])
            ->add('weekPrice',MoneyType::class,[
                'label'=>"Prix pendant la semaine",
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
            ->add('weekendPrice',MoneyType::class,[
                'label'=>"Prix en Week-end",
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
            ->add('published',CheckboxType::class,[
                'label'=>"Publié",
                'required'=>false,
                'attr'=>[
                    'class' => 'form-checkbox',
                ]
            ])
            ->add('mainImage',ImageType::class,[
                'label'=>"Image principale",

            ])
            ->add('secondaryImages', CollectionType::class,[
                'entry_type' => ImageType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'label' => "Image secondaire"
            ])
            ->add('equipments',EntityType::class, [
                'label' => 'Equipements',
                'attr'=>[
                    'class' => 'form-control',
                ],
                'multiple' => true,
                'required' => true,
                'class' => RoomEquipment::class,
            ])
            ->add('guestPlaceCount',IntegerType::class,[
                'label'=>"Nombre d'invités",
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Room::class,
        ]);
    }
}
