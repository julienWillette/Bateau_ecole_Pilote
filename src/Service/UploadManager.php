<?php

namespace App\Service;

use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class UploadManager extends AbstractController
{
    private $slugger;


    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function upload($form, string $directory, string $formName)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $cerfaFile */
            $file = $form->get($formName)->getData();

            if ($file) {
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                //dd($originalFilename);
                $safeFilename = $this->slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();
                try {
                    $file->move(
                        $this->getParameter($directory),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                return $newFilename;
            }
        }
    }
}
