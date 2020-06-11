<?php

namespace App\Form;

use App\Entity\Tariff;
use App\Entity\TypeOfTariff;
use Doctrine\ORM\EntityRepository;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TariffType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,[
                'label'=>'Entrez le titre du tarif'
            ])
            ->add('price',MoneyType::class,[
                'label'=>'Entrez le prix principal',
                'error_bubbling'=>" La donnée entrée n'est pas valide"
            ])
            ->add('detail',CKEditorType::class,[
                'label'=>'Entrez les détails concernant le tarif',
                'config_name' => 'my_config',

            ])
            ->add('typeOfTariff',EntityType::class,[
                'class'=>TypeOfTariff::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.title', 'DESC');
                },
                'choice_label' => 'title',
                'label'=>'Selectionnez les types de tarifs',
                'multiple'=>false,
                'required'=>true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tariff::class,
        ]);
    }
}
