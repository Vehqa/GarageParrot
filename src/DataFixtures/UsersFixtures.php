<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new Users();
        $user->setEmail('V.Parrot@gmail.com')
                ->setPassword('Parrot123');

        $manager->persist($user);
        $manager->flush();
    }
}
