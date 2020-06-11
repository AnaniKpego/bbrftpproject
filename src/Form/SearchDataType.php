<?php

namespace App\Form;

use App\Entity\RoomCategory;
use App\Entity\RoomEquipment;
use App\Entity\SearchData;
use App\Form\DataTransformer\FrenchToDateTimeTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\DataMapper\CheckboxListMapper;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchDataType extends AbstractType
{
    private $transformer;

    public function __construct(FrenchToDateTimeTransformer $transformer){
        $this->transformer = $transformer;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('bookingStartedAt',TextType::class,[
//                'label'=>false,
//                'required'=>false,
//                'attr'=>[
//                    'placeholder'=>"Date de début réservation"
//                ]
//            ])
//            ->add('bookingEndedAt',TextType::class,[
//                'label'=>false,
//                'required'=>false,
//                'attr'=>[
//                    'placeholder'=>"Date de fin réservation",
//                ]
//            ])
            ->add('q', TextType::class,[
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>"Entrez un mot ou un groupe de mots",
                    'class'=>'fom-control'
                ]
            ])
            ->add('minWeekPrice', IntegerType::class,[
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>"Semaine Prix min"
                ]
            ])
            ->add('maxWeekPrice', IntegerType::class,[
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>"Semaine Prix max"
                ]
            ])
            ->add('minWeekendPrice',IntegerType::class,[
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>"Fin de semaine Prix min"
                ]
            ])
            ->add('maxWeekendPrice',IntegerType::class,[
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>"Fin de semaine Prix max"
                ]
            ])
            ->add('guestPlaceCount', IntegerType::class,[
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>"Nombre d'invités",
                    'min'=> 1,
                    'max'=> 50
                ]
            ])
            ->add('equipments', EntityType::class, [
                'label'=>false,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded'=>false,
                'class' => RoomEquipment::class,
                'required'=>false
            ])
            ->add('categories', EntityType::class, [
                'label'=>false,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded'=>false,
                'class' => RoomCategory::class,
                'required'=>false
            ]);
//        $builder->get('bookingStartedAt')->addModelTransformer($this->transformer);
//        $builder->get('bookingEndedAt')->addModelTransformer($this->transformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
        ]);
    }
}
