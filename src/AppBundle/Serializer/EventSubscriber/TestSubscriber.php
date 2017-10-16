<?php

namespace AppBundle\Serializer\EventSubscriber;

use AppBundle\Entity\User;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;

class TestSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            ['event' => 'serializer.post_serialize', 'method' => 'onPostSerialize']
        ];
    }

    public function onPostSerialize(ObjectEvent $event)
    {
        $object = $event->getObject();

//        if ($object instanceof User) {
//
//        }
    }
}