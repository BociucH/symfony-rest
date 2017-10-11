<?php

namespace AppBundle\Event;

use AppBundle\Entity\User;
use Symfony\Component\EventDispatcher\Event;

class EventUserCreated extends Event
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}