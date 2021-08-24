<?php

namespace App\Controller\Admin;

use App\Entity\InfoContact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InfoContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InfoContact::class;
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

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('phone', 'Téléphone'),
            TextField::new('mail', 'E-mail'),
            TextEditorField::new('address', 'Adresse'),
        ];
    }
}
