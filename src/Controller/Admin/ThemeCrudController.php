<?php

namespace App\Controller\Admin;

use App\Entity\Theme;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ThemeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Theme::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom'),
        ];
    }
}
