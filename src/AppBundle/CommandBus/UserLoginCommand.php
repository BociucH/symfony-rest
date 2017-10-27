<?php

namespace AppBundle\CommandBus;

use AppBundle\Entity\ValueObject\Bearer;
use AppBundle\Entity\ValueObject\EmailAddress;

class UserLoginCommand
{
    /**
     * @var EmailAddress
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var Bearer
     */
    private $bearer;

    /**
     * UserLoginCommand constructor.
     * @param EmailAddress $email
     * @param string $password
     * @param Bearer $bearer
     */
    public function __construct(EmailAddress $email, $password, Bearer $bearer)
    {
        $this->email = $email;
        $this->password = $password;
        $this->bearer = $bearer;
    }

    /**
     * @return EmailAddress
     */
    public function getEmail(): EmailAddress
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return Bearer
     */
    public function getBearer(): Bearer
    {
        return $this->bearer;
    }
}