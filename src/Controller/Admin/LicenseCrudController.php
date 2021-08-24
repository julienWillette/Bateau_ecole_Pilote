<?php

namespace App\Controller\Admin;

use App\Entity\License;
use App\Form\ExamFeatureType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LicenseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return License::class;
    }


    public function configureFields(string $pageName): iterable
    {

        $imagePicture = ImageField::new('picture', 'Image');
        $imageUrl = UrlField::new('picture', 'Image');
        if (Crud::PAGE_INDEX === $pageName || Crud::PAGE_DETAIL === $pageName) {
            return [
                TextField::new('name', 'Nom'),
                TextEditorField::new('content', 'Description'),
                TextEditorField::new('feature', 'Caractéristiques'),
                CollectionField::new('examFeatures', 'Options')
                ->setEntryType(ExamFeatureType::class),
                $imagePicture,
                BooleanField::new('isActivated', 'En ligne'),
            ];
        } elseif (Crud::PAGE_EDIT === $pageName || Crud::PAGE_NEW === $pageName) {
            return [
                TextField::new('name', 'Nom'),
                TextEditorField::new('content', 'Description'),
                TextEditorField::new('feature', 'Caractéristiques'),
                CollectionField::new('examFeatures', 'Options')
                ->setEntryType(ExamFeatureType::class),
                $imageUrl,
                BooleanField::new('isActivated', 'En ligne'),
            ];
        }
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->remove(Crud::PAGE_DETAIL, Action::DELETE)
        ;
    }
}
