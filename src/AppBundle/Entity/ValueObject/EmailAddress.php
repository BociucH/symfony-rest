<?php

namespace AppBundle\Entity\ValueObject;

use Doctrine\ORM\Mapping as ORM;
use Negotiation\Exception\InvalidArgument;

/**
 * @ORM\Embeddable()
 */
class EmailAddress
{
    /**
     * @ORM\Column(name="email", type="string")
     * @var string
     */
    private $email = '';

    public function __construct(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgument("$email is invalid");
        }

        $this->email = $email;
    }

    public function __toString(): string
    {
        return (string)$this->email;
    }
}