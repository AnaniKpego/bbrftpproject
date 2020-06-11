<?php

namespace App\Form;

use App\Entity\ServiceBooking;
use App\Form\DataTransformer\FrenchToDateTimeTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceBookingType extends AbstractType
{
    private $transformer;

    public function __construct(FrenchToDateTimeTransformer $transformer){
        $this->transformer = $transformer;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bookingAt',TextType::class,[
                'label'=>'Du',
                'attr'=>[
                    'class'=>"form-control"
                ]

            ])
//            ->add('startedAt')
            ->add('endedAt',TextType::class,[
                'label'=>'Au',
                'attr'=>[
                    'class'=>"form-control"
                ]

            ])
//            ->add('amount')
//            ->add('service')
//            ->add('booker')
        ;
        $builder->get('bookingAt')->addModelTransformer($this->transformer);
        $builder->get('endedAt')->addModelTransformer($this->transformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ServiceBooking::class,
        ]);
    }
}
