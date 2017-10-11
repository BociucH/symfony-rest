<?php

namespace AppBundle\Event\Subscriber;

use AppBundle\AppBundleEvents;
use AppBundle\Event\EventUserCreated;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserCreatedSubscriber implements EventSubscriberInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public static function getSubscribedEvents()
    {
        return [
            AppBundleEvents::EVENT_USER_CREATED => [
                ['removeUser', 1]
            ]
        ];
    }

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function removeUser(EventUserCreated $event)
    {
        $user = $event->getUser();

        $this->entityManager->remove($user);
    }
}