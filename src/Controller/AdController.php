<?php

namespace App\Controller;

use App\Repository\AdRepository;
use App\Repository\HourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\FilterType;


class AdController extends AbstractController
{
    #[Route('/annonces', name: 'app_ad')]
    public function index(HourRepository $hourRepository, AdRepository $adRepository, Request $request): Response
    {
        //Récupérez les occasions depuis la base de données
        $ads = $adRepository->findAll();
        //Récupérez les horraires depuis la base de données
        $hours = $hourRepository->findAll(); 
        
        return $this->render('ad/index.html.twig', [
            'ads' => $ads,
            'hours' => $hours,
            'controller_name' => 'AdController',
        ]);
    }
}

