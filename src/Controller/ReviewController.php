<?php

namespace App\Controller;

use App\Repository\HourRepository;
use App\Repository\ReviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Review;

class ReviewController extends AbstractController
{
    #[Route('/avis', name: 'app_review')]
    public function index(Request $request, ReviewRepository $reviewRepository, HourRepository $hourRepository, EntityManagerInterface $entityManager): Response
    {
        // Récupérez les horaires depuis la base de données
        $reviews = $reviewRepository->findAll();
        // Récupérez les horaires depuis la base de données
        $hours = $hourRepository->findAll(); 

        if ($request->isMethod('POST')) {
            $data = $request->request->all();

            // Créez une nouvelle instance de l'entité Review
            $review = new Review();
            $review->setSurname($data['surname']);
            $review->setName($data['name']);
            $review->setGrade($data['grade']);
            $review->setComment($data['comment']);

            $entityManager->persist($review);
            $entityManager->flush();

            // Confirmation
            $this->addFlash('success', 'Votre avis a été envoyé avec succès.');
            
        }

        return $this->render('review/index.html.twig', [
            'controller_name' => 'ReviewController',
            'reviews' => $reviews,
            'hours' => $hours,
        ]);
    }
}
