<?php

namespace App\Controller\Admin;

use App\Entity\{Faq, Blog, Home, User, Theme, Contact, License, InfoContact};
use App\Controller\Admin\BlogCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\{MenuItem, Dashboard};
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

/**
 * @IsGranted("ROLE_ADMIN")
 */

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        return $this->redirect($routeBuilder->setController(BlogCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
        ->setTitle('<img src="https://zupimages.net/up/21/04/2zj1.png" width="30%"> <br> Espace administrateur')
        ->setFaviconPath('https://zupimages.net/up/21/04/2zj1.png');
    }


    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Accueil', 'fa fa-home', Home::class);
        yield MenuItem::linkToCrud('Blog', 'far fa-newspaper', Blog::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-envelope', Contact::class);
        yield MenuItem::linkToCrud('Faq', 'fas fa-question', Faq::class);
        yield MenuItem::linkToCrud('License', 'fas fa-id-badge', License::class);
        yield MenuItem::linkToCrud('Mes Informations', 'fas fa-info-circle', InfoContact::class);
        yield MenuItem::linkToCrud('Thème(actus)', 'fas fa-text-height', Theme::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToUrl('Retour sur le site', 'fas fa-desktop', '/');
    }
}
