<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServicesRepository;
use App\Repository\HourRepository;
use App\Repository\ReviewRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ServicesRepository $servicesRepository, HourRepository $hourRepository, ReviewRepository $reviewRepository): Response
    {
    // Récupérez les services depuis la base de données
    $services = $servicesRepository->findAll();
    // Récupérez les horraires depuis la base de données
    $hours = $hourRepository->findAll(); 
    // Récupérez les Avis depuis la base de données
    $reviews = $reviewRepository->findAll();


    return $this->render('home/index.html.twig', [
        'services' => $services,
        'hours' => $hours,
        'reviews' => $reviews,
    ]);
    }
}
