<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Hour;

class HourFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $hour = new Hour();
        $hour->setMonday('8H45-12H00, 14H00-18H00')
            ->setTuesday('8H45-12H00, 14H00-18H00')
            ->setWednesday('8H45-12H00, 14H00-18H00')
            ->setThursday('8H45-12H00, 14H00-18H00')
            ->setFriday('8H45-12H00, 14H00-18H00')
            ->setSaturday('8H45-12H30')
            ->setSunday('FERMEE');

        $manager->persist($hour);
        $manager->flush();
    }
}
