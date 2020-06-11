<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => "Prénoms *",
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('lastName',TextType::class, [
                'label' => "Nom *",
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('email',EmailType::class, [
                'label' => "Email *",
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('phone',TextType::class, [
                'label' => "Téléphone *",
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('city',TextType::class, [
                'label' => "Ville *",
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('address',TextType::class, [
                'label' => "Adresse",
                'attr' => [
                    'class' => 'form-control',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
