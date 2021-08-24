<?php

namespace App\Controller\Admin;

use App\Entity\Faq;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FaqCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Faq::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextEditorField::new('question', 'Questions'),
            TextEditorField::new('answer', 'Réponses'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        $deleteAction = Action::new('Delete', '')
        ->setIcon('fas fa-trash')
        ->linkToCrudAction('deleteAction');

        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->add(Crud::PAGE_INDEX, $deleteAction)
        ->remove(Crud::PAGE_INDEX, Action::DELETE)
        ->remove(Crud::PAGE_DETAIL, Action::DELETE);
    }
    public function deleteAction(AdminContext $context)
    {
        $id = $context->getRequest()->query->get('entityId');
        $entity = $this->getDoctrine()->getRepository(Faq::class)->find($id);

        $this->deleteEntity($this->get('doctrine')->getManagerForClass($context->getEntity()->getFqcn()), $entity);
        $this->addFlash('success', 'Article supprimé');
        // ici modifier la redirection selon ou l'admin doit être redirigé après l'action delete
        return $this->redirect('admin');
    }
}
