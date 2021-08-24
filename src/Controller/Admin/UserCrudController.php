<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->remove(Crud::PAGE_DETAIL, Action::EDIT)
            ->remove(Crud::PAGE_DETAIL, Action::DELETE)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email', 'E-mail'),
            TextField::new('civility', 'Civilité'),
            TextField::new('firstname', 'Prénom'),
            TextField::new('lastname', 'Nom'),
            TextField::new('address', 'adresse'),
            TextField::new('phone', 'Téléphone'),
            TextField::new('zipCode', 'Code postal'),
            TextField::new('country', 'Pays'),
            DateField::new('birthday', 'Date de naissance')
                ->setFormat('d/mM/y'),
            UrlField::new('cerfaFilename', 'Document Cerfa')
                ->setTemplatePath('admin/cerfa.html.twig')
                ->onlyOnDetail(),
            UrlField::new('identityFilename', 'Document d\'identité')
                ->setTemplatePath('admin/identity.html.twig')
                ->onlyOnDetail(),
            UrlField::new('identityPictureFilename', 'Photo d\'identité')
                ->setTemplatePath('admin/identityPicture.html.twig')
                ->onlyOnDetail(),
            UrlField::new('taxStampDeliverance', 'Timbre fiscal Délivrance')
                ->setTemplatePath('admin/taxStampDeliverance.html.twig')
                ->onlyOnDetail(),
            UrlField::new('taxStampInnerWater', 'Timbre fiscal Permis Eaux intérieures')
                ->setTemplatePath('admin/taxStampInnerWater.html.twig')
                ->onlyOnDetail(),
            UrlField::new('taxStampCoastal', 'Timbre fiscal Permis Côtier')
                ->setTemplatePath('admin/taxStampCoastal.html.twig')
                ->onlyOnDetail(),
        ];
    }
}
