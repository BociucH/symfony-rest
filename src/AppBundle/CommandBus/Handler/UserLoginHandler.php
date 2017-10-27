<?php

namespace AppBundle\CommandBus\Handler;

use AppBundle\CommandBus\UserLoginCommand;
use AppBundle\Entity\Repository\UserRepository;
use AppBundle\Entity\Session;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class UserLoginHandler
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var UserPasswordEncoder
     */
    private $passwordEncoder;

    /**
     * UserLoginHandler constructor.
     * @param UserRepository $userRepository
     * @param EntityManagerInterface $em
     * @param UserPasswordEncoder $passwordEncoder
     */
    public function __construct(UserRepository $userRepository, EntityManagerInterface $em, UserPasswordEncoder $passwordEncoder)
    {
        $this->userRepository = $userRepository;
        $this->em = $em;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function handle(UserLoginCommand $command)
    {
        $user = $this->userRepository->findOneByEmail($command->getEmail());

        if ($user === null || !$this->passwordEncoder->isPasswordValid($user, $command->getPassword())) {
            throw new Exception('My Error');
        }

        $session = new Session($user, $command->getBearer());

        $this->em->persist($session);
    }
}