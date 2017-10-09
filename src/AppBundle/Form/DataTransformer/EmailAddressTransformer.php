<?php

namespace AppBundle\Form\DataTransformer;

use AppBundle\Entity\ValueObject\EmailAddress;
use Negotiation\Exception\InvalidArgument;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class EmailAddressTransformer implements DataTransformerInterface
{
    public function transform($emailAddress)
    {
        /** @var EmailAddress $emailAddress */
        if (null === $emailAddress) {
            return '';
        }

        return $emailAddress->__toString();
    }

    public function reverseTransform($email)
    {
        if (!$email) {
            return null;
        }

        try {
            return new EmailAddress($email);

        } catch (InvalidArgument $e) {
            throw new TransformationFailedException();
        }
    }

}