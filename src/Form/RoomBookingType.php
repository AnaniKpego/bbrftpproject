<?php

namespace App\Form;

use App\Entity\RoomBooking;
use App\Form\DataTransformer\FrenchToDateTimeTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomBookingType extends AbstractType
{
    private $transformer;

    public function __construct(FrenchToDateTimeTransformer $transformer){
        $this->transformer = $transformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startedAt', TextType::class,[
                'label'=>"Date de début de réservation",
                'attr'=>[
                    'class'=>"form-control"
                ]
            ])
            ->add('endedAt', TextType::class,[
                'label'=>"Date de fin de réservation",
                'attr'=>[
                    'class'=>"form-control"
                ]
            ])
        ;
        $builder->get('startedAt')->addModelTransformer($this->transformer);
        $builder->get('endedAt')->addModelTransformer($this->transformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RoomBooking::class,
        ]);
    }
}
