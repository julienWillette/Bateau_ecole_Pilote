<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'email',
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            /**->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])**/
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Répéter le mot de passe'],
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Votre nom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Prenom',
                'attr' => [
                    'placeholder' => 'Votre prenom'
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse',
                'attr' => [
                    'placeholder' => 'Votre Adresse'
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => 'Telephone',
                'attr' => [
                    'placeholder' => 'Votre numéro'
                ]
            ])
            ->add('civility', ChoiceType::class, [
                'label' => 'Civilité',
                'attr' => [],
                'choices' => [
                    'Mr' => 'Monsieur',
                    'Mme' => 'Madame',
                ]
            ])
            ->add('zipCode', TextType::class, [
                'label' => 'Code postal',
                'attr' => [
                    'placeholder' => 'Code postal'
                ]
            ])
            ->add('country', TextType::class, [
                'label' => 'Pay',
                'attr' => [
                    'placeholder' => 'Votre pay'
                ]
            ])
            ->add('birthday', BirthdayType::class, [
                'label' => 'Date de naissance'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
