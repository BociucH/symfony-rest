<?php

namespace AppBundle\Entity\ValueObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class SaltHash
{
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $saltHash;

    /**
     * SaltHash constructor.
     */
    public function __construct()
    {
        $this->saltHash = md5(random_bytes(10));
    }

    public static function existing(string $saltHash): SaltHash
    {
        $self = new self();
        $self->saltHash = $saltHash;

        return $self;
    }

    public function isEqual(SaltHash $hash): bool
    {
        return $this->saltHash === $hash->saltHash;
    }

    public function __toString(): string
    {
        return (string) $this->saltHash;
    }
}