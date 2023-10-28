<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Services;

class ServicesFixtures extends Fixture
{
     public function load(ObjectManager $manager): void
     {
        $service = new Services();
        $service->setTitle('Entretien')
                ->setDescription('amortisseurs, pneumatiques, vitrages, batteries, et bien plus encore, nous V.Parrot nous occupons de tout sur votre voiture')
                ->setPrice('100')
                ->setImages('../../assets/images/entretien.jpg');
        
        $service2 = new Services();
        $service2->setTitle('Peinture')
                ->setDescription('Un covering, une petite retouche, nous trouverons la couleur adaptee à vos attentes, pour refaire ou modifier votre voiture')
                ->setPrice('250')
                ->setImages('../../assets/images/peinture.jpg');

        $service3 = new Services();
        $service3->setTitle('Vidange')
                ->setDescription('Nous vidons et nettoyons vos reservoirs, tous les 10 000 à 15 000 km sur un moteur essence, 7000 à 10000 sur moteur diesel')
                ->setPrice('80')
                ->setImages('../../assets/images/vidange.png');

        $manager->persist($service);
        $manager->persist($service2);
        $manager->persist($service3);

        $manager->flush();
    }
}
