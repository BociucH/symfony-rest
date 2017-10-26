<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use AppBundle\Entity\ValueObject\EmailAddress;
use AppBundle\Entity\ValueObject\UserRole;
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
        $user->setRole(new UserRole(UserRole::ROLE_USER));
        $user->setPassword();
        $manager->persist($user);

        $user = new User();
        $user->setFirstName('Tomasz');
        $user->setLastName('Sosnowicz');
        $user->setEmail(new EmailAddress('tomasz@sosnowicz.pl'));
        $user->setRole(new UserRole(UserRole::ROLE_USER));
        $manager->persist($user);

        $user = new User();
        $user->setFirstName('Kazik');
        $user->setLastName('Drzewo');
        $user->setEmail(new EmailAddress('kazik@drzewo.pl'));
        $user->setRole(new UserRole(UserRole::ROLE_USER));
        $manager->persist($user);

        $manager->flush();
    }

}