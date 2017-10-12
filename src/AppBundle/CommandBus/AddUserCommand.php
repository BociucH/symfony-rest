<?php

namespace AppBundle\CommandBus;

use AppBundle\Entity\ValueObject\EmailAddress;

class AddUserCommand
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var EmailAddress
     */
    private $email;

    /**
     * AddUserCommand constructor.
     *
     * @param EmailAddress $emailAddress
     */
    public function __construct(EmailAddress $emailAddress)
    {
        $this->email = $emailAddress;
    }

    /**
     * @return EmailAddress
     */
    public function getEmail(): EmailAddress
    {
        return $this->email;
    }

    /**
     * @param EmailAddress $email
     */
    public function setEmail(EmailAddress $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(?string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(?string $lastName)
    {
        $this->lastName = $lastName;
    }
}