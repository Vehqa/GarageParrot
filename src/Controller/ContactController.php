<?php

namespace App\Controller;

use App\Repository\HourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(HourRepository $hourRepository, Request $request, MailerInterface $mailerInterface): Response
    {
        // Récupérez les horaires via la base de données :
        $hours = $hourRepository->findAll();
        // Le titre pour pré-remplir le formulaire de contact via les annonces.
        $title = $request->query->get('title');

        if ($request->isMethod('POST')) {
            // Récupérez les données du formulaire
            $name = $request->request->get('name');
            $email = $request->request->get('email');
            $message = $request->request->get('message');

            // Validez les données du formulaire 
            if (!$name || !$email || !$message) {
                // Message d'erreur
                $this->addFlash('error', 'Veuillez remplir tous les champs du formulaire.');
            } else {
                // Créez le contenu de l'e-mail.
                $emailContent = "Nom : $name\n";
                $emailContent .= "Email : $email\n";
                $emailContent .= "Message : $message\n";

                $emailSubject = 'Nouveau message de ' . $name;
                // Créez l'e-mail avec le contenu personnalisé
                $email = (new Email())
                    ->from('hello@example.com')
                    ->to('V.Parrot@gmail.com')
                    ->subject($emailSubject)
                    ->text($emailContent);

                // Envoyez l'e-mail
                $mailerInterface->send($email);

                // Affichez un message de succès
                $this->addFlash('success_mess', 'Votre message a été envoyé avec succès.');
            }
        }

        return $this->render('contact/index.html.twig', [
            'hours' => $hours,
            'title' => $title,
            'controller_name' => 'ContactController',
        ]);
    }
}