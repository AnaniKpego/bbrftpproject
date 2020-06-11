<?php

namespace App\Form;

use App\Entity\GlobalSetting;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GlobalSettingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('siteTitle')
            ->add('siteDescription')
            ->add('siteEmail')
            ->add('phone1')
            ->add('phone2')
            ->add('siteLogo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GlobalSetting::class,
        ]);
    }
}
