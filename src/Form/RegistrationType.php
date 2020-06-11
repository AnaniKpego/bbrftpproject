<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, $this->getConfiguration("Prénom", "Votre prénom ...",[
                'attr'=>[
                    'class'=>"form-control"
                ]
            ]))
            ->add('lastName', TextType::class, $this->getConfiguration("Nom", "Votre nom de famille ...",[
                'attr'=>[
                    'class'=>"form-control"
                ]
            ]))
            ->add('email', EmailType::class, $this->getConfiguration("Email", "Votre adresse email",[
                'attr'=>[
                    'class'=>"form-control"
                ]
            ]))
            ->add('phone', TextType::class,$this->getConfiguration("Téléphone","Votre téléphone",[
                'attr'=>[
                    'class'=>"form-control"
                ]
            ]))
            ->add('city', TextType::class,$this->getConfiguration("Ville","La ville où vous habitez",[
                'attr'=>[
                    'class'=>"form-control"
                ]
            ]))
            ->add('address', TextType::class,$this->getConfiguration("Adresse","Votre adresse",[
                'attr'=>[
                    'class'=>"form-control"
                ]
            ]))
            ->add('password', PasswordType::class,$this->getConfiguration("Mot de passe","Votre mot de passe",[
                'attr'=>[
                    'class'=>"form-control"
                ]
            ]))
            ->add('passwordConfirm', PasswordType::class, $this->getConfiguration("Confirmation de mot de passe", "Veuillez confirmer votre mot de passe",[
                'attr'=>[
                    'class'=>"form-control"
                ]
            ]))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
