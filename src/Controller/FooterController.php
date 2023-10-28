<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\HourRepository;

class FooterController extends AbstractController
{
    private $hourRepository;

    public function __construct(HourRepository $hourRepository)
    {
        $this->hourRepository = $hourRepository;
    }

    public function index(): Response
    {
        $hours = $this->hourRepository->findAll(); // Ou utilisez une autre méthode de recherche si nécessaire.

        return $this->render('footer.html.twig', [
            'hours' => $hours,
        ]);
    }
}
