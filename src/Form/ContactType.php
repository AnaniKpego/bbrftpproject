<?php

namespace App\Form;

use App\Entity\Contact;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'label'=>'Votre nom et prénom'
            ])
            ->add('email',EmailType::class,[
                'label'=>'Votre email'
            ])
            ->add('phone',TextType::class,[
                'label'=>'Votre Téléphone'
            ])
            ->add('subject',TextType::class,[
                'label'=>'Objet'
            ])
            ->add('message',TextareaType::class,[
                'label'=>'Message',
                'attr'=>[
                    'min' => 50,
                ]
            ])
//            ->add('message',CKEditorType::class,[
//                'config_name' => 'contact_config',
//                'label'=>'Message',
//                'attr'=>[
//                    'min' => 200,
//                ]
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
