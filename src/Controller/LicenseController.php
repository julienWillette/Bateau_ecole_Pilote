<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\License;

class LicenseController extends AbstractController
{
    /**
     * @Route("/permis", name="license_index")
     */
    public function index(): Response
    {


        $licenses = $this->getDoctrine()
        ->getRepository(License::class)
        ->findAll();
        return $this->render('license/index.html.twig', [
            'licenses' => $licenses,
        ]);
    }
}
