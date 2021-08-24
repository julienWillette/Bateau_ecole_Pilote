<?php

namespace App\Controller\Admin;

use App\Entity\Home;
use App\Form\IconType;
use App\Entity\Advertise;
use App\Form\AdvertiseType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HomeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Home::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            UrlField::new('video', 'Vidéo'),
            TextField::new('title', 'Titre'),
            TextEditorField::new('content', 'Description'),
            TextField::new('quote', 'Citation'),
            CollectionField::new('icons', 'Icônes')
            ->setEntryType(IconType::class)
            ->setTemplatePath('admin/homeIcons.html.twig')

        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->remove(Crud::PAGE_DETAIL, Action::DELETE)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ;
    }
}
