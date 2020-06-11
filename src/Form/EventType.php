<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Tariff;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,[
                'label'=>'Tire',
                'required'=>true
            ])

            ->add('subtitle',CKEditorType::class,[
                'label'=>'Résumé',
                'config_name' => 'my_config',
                'attr'=>[
                    'rows'=>10
                ]
            ])
            ->add('description',CKEditorType::class,[
                'label'=>'Description',
                'config_name' => 'my_config',
                'required'=>true,
                'attr'=>[
                    'rows'=>10
                ]
            ])
            ->add('phone',TelType::class,[
               'label'=> 'Téléphone'
            ])
            ->add('email',EmailType::class,[
                'label'=>'Email à contacter',
                'required'=>true
            ])
            ->add('startAt',DateTimeType::class,[
                'label'=>'Date de deroulement',
//                'attr' => ['class' => 'js-datepicker'],


                'years' => range(date('Y'), date('Y')+100),
                'months' => range(date('M'), 12),
                'days' => range(1, 31),
                'placeholder' => [
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                    'hour' => 'Heure', 'minute' => 'Minute'
                ],
                'html5'=>false,
                'format' => 'dd-MM-yyyy H:i:s',

            ])
           ->add('imageFile',VichImageType::class,[
               'label'=>'Image',
               'attr'=>[
                   'class'=>'form-control-file col-md-6'
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
            'data_class' => Event::class,
        ]);
    }
}
