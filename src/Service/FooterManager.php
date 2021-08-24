<?php

namespace App\Service;

use App\Repository\InfoContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FooterManager extends AbstractController
{
    private $info;

    public function __construct(InfoContactRepository $info)
    {
        $this->info = $info;
    }

    public function infoFooter()
    {
        $footer = $this->info->findAll();

        return $footer;
    }
}
