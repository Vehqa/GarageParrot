<?php

namespace App\Controller;

use App\Entity\Services;
use App\Repository\ServicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\HourRepository;

class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function index(ServicesRepository $servicesRepository, HourRepository $hourRepository): Response
    {
        $controllerName = 'ServicesController';
        // Récupérez les services depuis la base de données
        $services = $servicesRepository->findAll();
        // Récupérez les horraires depuis la base de données
        $hours = $hourRepository->findAll(); 

        return $this->render('services/index.html.twig', [
            'services' => $services,
            'hours' => $hours,
            'controller_name' => $controllerName,
        ]);
    }
}