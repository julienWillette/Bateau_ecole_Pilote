<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'votre nom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Prenom',
                'attr' => [
                    'placeholder' => 'votre Prenom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'email',
                'attr' => [
                    'placeholder' => 'votre email'
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'votre nom'
                ]
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'votre nom'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
