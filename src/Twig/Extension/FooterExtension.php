<?php

namespace App\Twig\Extension;

use App\Entity\Hour;
use App\Twig\Runtime\FooterRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use App\Repository\HourRepository;

class FooterExtension extends AbstractExtension
{

    public function __construct(private HourRepository $hourRepository)
    {
        $this->hourRepository = $hourRepository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('footerData', [FooterRuntime::class, 'getFooterData']),
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
