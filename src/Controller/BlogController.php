<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(BlogRepository $blogs): Response
    {
        return $this->render('blog/index.html.twig', [
            'blogs' => $blogs->findAllByDate(),
        ]);
    }
}
