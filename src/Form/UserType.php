<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',TextType::class,[
                'label' => 'Prenom',
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Téléphone',
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Addresse',
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
            ->add('status', CheckboxType::class, [
                'label' => 'Status',
                'required'=>false,
                'attr'=>[
                    'class' => 'form-checkbox',
                ]
            ])
            ->add('userRoles', EntityType::class, [
                'label' => 'Roles *',
                'attr'=>[
                    'class' => 'form-control',
                    'placeholder' => 'Roles *'
                ],
                'multiple' => true,
                'required' => true,
                'class' => Role::class,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
