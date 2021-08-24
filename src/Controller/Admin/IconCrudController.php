<?php

namespace App\Controller\Admin;

use App\Entity\Icon;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class IconCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Icon::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
