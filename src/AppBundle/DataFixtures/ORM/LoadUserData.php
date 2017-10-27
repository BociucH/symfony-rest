<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use AppBundle\Entity\ValueObject\EmailAddress;
use AppBundle\Entity\ValueObject\PasswordHash;
use AppBundle\Entity\ValueObject\SaltHash;
use AppBundle\Entity\ValueObject\UserRole;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class LoadUserData extends Fixture
{
    /**
     * @var PasswordEncoderInterface
     */
    private $encoder;

    public function load(ObjectManager $manager)
    {
        $this->encoder = $this->container->get('security.password_encoder');

        $user = new User(new SaltHash());
        $user->setFirstName('Jan');
        $user->setLastName('Kowalski');
        $user->setEmail(new EmailAddress('jan@kowalski.pl'));
        $user->setRole(new UserRole(UserRole::ROLE_USER));
        $user->setPassword(new PasswordHash($this->encoder->encodePassword($user, 'test')));
        $manager->persist($user);

        $manager->flush();
    }
}