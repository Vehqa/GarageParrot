<?php

namespace App\Twig;

use App\Repository\HourRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FooterExtension extends AbstractExtension
{
    public function __construct(private HourRepository $hourRepository)
    {
        $this->hourRepository = $hourRepository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('footerData', [$this, 'getFooterData'])
        ];
    }

    public function getFooterData(): array
    {
        $hours = $this->hourRepository->findAll();
        return [
            'hours' => $hours,
        ];
    }
}