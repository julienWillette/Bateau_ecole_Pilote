<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class TaxStampCoastalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ...
            ->add('taxStampCoastal', FileType::class, [
                'label' => 'Timbre Fiscale Permis Côtier (38.00 Euros) (Format PDF, JPEG)',
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '2000k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/jpeg',
                            'image/jpg'
                        ],
                        'mimeTypesMessage' => 'Le format PDF ou JPEG est requis',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
