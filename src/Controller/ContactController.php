<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/me-contacter", name="contact")
     */
    public function index(
        Request $request,
        EntityManagerInterface $manager,
        MailerInterface $mailer
    ): Response {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $contactMail = $form->handleRequest($request);
        $message = "";
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($contact);
            $manager->flush();

            $email = (new TemplatedEmail())
                ->from($contactMail->get('email')->getData())
                ->to('julien.willette@gmail.com')
                ->subject('Demande de contact')
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'mail' => $contactMail->get('email')->getData(),
                    'content' => $contactMail->get('content')->getData(),
                    'firstname' => $contactMail->get('firstname')->getData(),
                    'lastname' => $contactMail->get('lastname')->getData(),
                    'phone' => $contactMail->get('phone')->getdata(),
                    $message = "Votre message a bien été envoyé !"

                ]);
            $mailer->send($email);
            $this->addFlash('message', 'Mail de contact envoyé !');
            return $this->redirectToRoute('contact');
        }



        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
            'message' => $message
        ]);
    }
}
