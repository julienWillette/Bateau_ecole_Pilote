<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use App\Form\PictureType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blog::class;
    }

    public function configureFields(string $pageName): iterable
    {
        if (Crud::PAGE_INDEX === $pageName || Crud::PAGE_DETAIL === $pageName) {
            return [
                AssociationField::new('theme', 'Thème'),
                TextField::new('title', 'Titre'),
                TextEditorField::new('content', 'Description'),
                CollectionField::new('pictures', 'Image')
                    ->setEntryType(PictureType::class)
                    ->setTemplatePath('admin/blogPictures.html.twig'),
                UrlField::new('video', 'Vidéo'),
                DateTimeField::new('createdAt', 'Date de création'),
                BooleanField::new('isActivated', 'En ligne'),
            ];
        } elseif (Crud::PAGE_EDIT === $pageName || Crud::PAGE_NEW === $pageName) {
            return [
                AssociationField::new('theme', 'Thème'),
                TextField::new('title', 'Titre'),
                TextEditorField::new('content', 'Description'),
                CollectionField::new('pictures', 'Image')
                    ->setEntryType(PictureType::class),
                UrlField::new('video', 'Vidéo'),
                DateTimeField::new('createdAt', 'Date de création'),
                BooleanField::new('isActivated', 'En ligne'),
            ];
        };
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->remove(Crud::PAGE_DETAIL, Action::DELETE);
    }
}
