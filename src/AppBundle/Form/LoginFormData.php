<?php

namespace AppBundle\Form;

use AppBundle\Entity\ValueObject\EmailAddress;

class LoginFormData
{
    /**
     * @var EmailAddress
     */
    public $login;

    /**
     * @var string
     */
    public $password;
}