<?php

namespace App\Controller;

use App\Entity\Home;
use App\Entity\Icon;
use App\Entity\License;
use App\Repository\BlogRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(BlogRepository $blogs): Response
    {
        $home = $this->getDoctrine()
        ->getRepository(Home::class)
        ->findAll();
        $licenses = $this->getDoctrine()
        ->getRepository(License::class)
        ->findAll();
        $icons = $this->getDoctrine()
        ->getRepository(Icon::class)
        ->findAll();

        return $this->render('home/index.html.twig', [
            'home' => $home,
            'licences' => $licenses,
            'icons' => $icons,
            'blogs' => $blogs->findFourByDate()

        ]);
    }
}
