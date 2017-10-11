<?php

namespace AppBundle\CommandBus\Handler;

use AppBundle\AppBundleEvents;
use AppBundle\CommandBus\AddUserCommand;
use AppBundle\Entity\User;
use AppBundle\Event\EventUserCreated;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class AddUserHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var EventDispatcher
     */
    private $dispatcher;

    /**
     * AddUserHandler constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        EventDispatcherInterface $dispatcher
    )
    {
        $this->entityManager = $entityManager;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param AddUserCommand $command
     */
    public function handle(AddUserCommand $command)
    {
        $user = new User();
        $user->setFirstName($command->getFirstName());
        $user->setLastName($command->getLastName());
        $user->setEmail($command->getEmail());

        $this->entityManager->persist($user);

        $this->dispatcher->dispatch(
            AppBundleEvents::EVENT_USER_CREATED,
            new EventUserCreated($user)
        );
    }
}