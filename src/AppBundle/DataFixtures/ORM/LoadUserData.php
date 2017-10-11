<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use AppBundle\Entity\ValueObject\EmailAddress;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstName('Jan');
        $user->setLastName('Kowalski');
        $user->setEmail(new EmailAddress('jan@kowalski.pl'));
        $manager->persist($user);

        $user = new User();
        $user->setFirstName('Tomasz');
        $user->setLastName('Sosnowicz');
        $user->setEmail(new EmailAddress('tomasz@sosnowicz.pl'));
        $manager->persist($user);

        $user = new User();
        $user->setFirstName('Kazik');
        $user->setLastName('Drzewo');
        $user->setEmail(new EmailAddress('kazik@drzewo.pl'));
        $manager->persist($user);

        $manager->flush();
    }

}