<?php

namespace AppBundle\CommandBus\Handler;

use AppBundle\CommandBus\AddUserCommand;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class AddUserHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * AddUserHandler constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param AddUserCommand $command
     */
    public function handle(AddUserCommand $command)
    {
        $user = new User($command->getFirstName(), $command->getLastName());

        $this->entityManager->persist($user);
    }
}