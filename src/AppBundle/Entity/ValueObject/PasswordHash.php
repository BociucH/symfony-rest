<?php

namespace AppBundle\Entity\ValueObject;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

/**
 * @ORM\Embeddable()
 */
class PasswordHash
{
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $passwordHash;

    /**
     * PasswordHash constructor.
     * @param string $passwordHash
     */
    public function __construct($passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * @param UserPasswordEncoder $passwordEncoder
     * @param $user
     * @param $newPassword
     *
     * @return PasswordHash
     */
    public static function createUsingPasswordEncoder(UserPasswordEncoder $passwordEncoder, $user, $newPassword): self
    {
        return new self($passwordEncoder->encodePassword($user, $newPassword));
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->passwordHash;
    }
}