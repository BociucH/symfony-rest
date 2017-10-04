<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstName('Jan');
        $user->setLastName('Kowalski');
        $manager->persist($user);

        $user = new User();
        $user->setFirstName('Tomasz');
        $user->setLastName('Sosnowicz');
        $manager->persist($user);

        $user = new User();
        $user->setFirstName('Kazik');
        $user->setLastName('Drzewo');
        $manager->persist($user);

        $manager->flush();
    }

}