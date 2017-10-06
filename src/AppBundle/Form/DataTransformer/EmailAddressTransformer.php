<?php

namespace AppBundle\Form\DataTransformer;

use AppBundle\Entity\ValueObject\EmailAddress;
use Symfony\Component\Form\DataTransformerInterface;

class EmailAddressTransformer implements DataTransformerInterface
{
    public function transform($emailAddress)
    {
        /** @var EmailAddress $emailAddress */
        return $emailAddress->__toString();
    }

    public function reverseTransform($value)
    {

    }

}