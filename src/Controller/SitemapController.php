<?php

namespace App\Controller;

use App\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    /**
     * @Route("/sitemap.xml", name="sitemap", defaults={"_format"="xml"})
     */
    public function index(Request $request)
    {
        // Nous récupérons le nom d'hôte depuis l'URL
        $hostname = $request->getSchemeAndHttpHost();

        // On initialise un tableau pour lister les URLs
        $urls = [];

        // On ajoute les URLs "statiques"
        $urls[] = ['loc' => $this->generateUrl('home')];
        $urls[] = ['loc' => $this->generateUrl('contact')];
        $urls[] = ['loc' => $this->generateUrl('app_login')];
        $urls[] = ['loc' => $this->generateUrl('app_register')];
        $urls[] = ['loc' => $this->generateUrl('license_index')];
        $urls[] = ['loc' => $this->generateUrl('profile')];
        $urls[] = ['loc' => $this->generateUrl('faq')];
        $urls[] = ['loc' => $this->generateUrl('blog')];


        // Fabrication de la réponse XML
        $response = new Response(
            $this->renderView('sitemap/index.html.twig', [
                'urls' => $urls,
                'hostname' => $hostname]
            )
        );

        // Ajout des entêtes
        $response->headers->set('Content-Type', 'text/xml');

        // On envoie la réponse
        return $response;
    }
}
