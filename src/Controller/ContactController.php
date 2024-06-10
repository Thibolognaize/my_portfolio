<?php
// src/Controller/ContactController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route; // Importez l'annotation Route

class ContactController extends AbstractController
{
    #[Route('/submit_form', name: 'submit_form', methods: ['POST'])]
    public function submitForm(Request $request, MailerInterface $mailer): Response
    {
        // Récupérer les données du formulaire
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $message = $request->request->get('message');
        
        // Vérifier si les données ont été correctement récupérées
        dump($name, $email, $message); // Utilisez dump() pour vérifier les valeurs
        
        // Envoyer l'e-mail
        $email = (new Email())
            ->from($email)
            ->to('thibault.feat@gmail.com')
            ->subject('NewMsg-Portfolio')
            ->text($message);

        $mailer->send($email);

        // Ajouter un flash message
        $this->addFlash('success', 'Votre message a bien été envoyé.');

        // Rediriger ou retourner une réponse
        return $this->redirectToRoute('app_main');
    }
}
