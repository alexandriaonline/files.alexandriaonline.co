<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('example');
        $user->setPlainPassword('example');
        $user->setEmail('alex@example.com');
        $user->setEnabled(true);

        $manager->persist($user);

        $manager->flush();
    }
}
