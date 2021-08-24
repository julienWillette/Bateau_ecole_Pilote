<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class TaxStampDeliveranceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ...
            ->add('taxStampDeliverance', FileType::class, [
                'label' => 'Timbre Fiscale délivrance (70.00 Euros) (Format PDF, JPEG)',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => true,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
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
            // ...
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
