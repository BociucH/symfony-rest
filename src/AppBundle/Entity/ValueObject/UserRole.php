<?php

namespace AppBundle\Entity\ValueObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class UserRole
{
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_USER = 'ROLE_USER';

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $role;

    /**
     * UserRole constructor.
     * @param string $role
     */
    public function __construct(string $role)
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->role;
    }
}