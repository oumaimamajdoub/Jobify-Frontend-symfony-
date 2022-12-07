<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function index(): Response
    {
        return $this->render('mailer/index.html.twig', [
            'controller_name' => 'MailerController',
        ]);
    }


    #[Route('/email',name: "app_sendNewPost_mail")]
    public function sendEmail(MailerInterface $mailer): Response
    {

        $email = (new Email())
            ->from('bacem.mallek999@gmail.com')
            ->to('afef.zouaoui@esprit.tn')
            ->subject('new Job!')
            ->text('Un nouveau job a été ajouté!');

        $mailer->send($email);
        return $this->render('mailer/index.html.twig', [
            'controller_name' => 'MailerController',
        ]);

    }

}