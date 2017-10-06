<?php

namespace AppBundle\Form;

use AppBundle\Entity\ValueObject\EmailAddress;

class UserData
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var EmailAddress
     */
    public $email;
}