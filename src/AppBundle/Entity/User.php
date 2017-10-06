<?php

namespace AppBundle\Entity;

use AppBundle\Entity\ValueObject\EmailAddress;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="\AppBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="first_name", type="string")
     * @var string
     */
    private $firstName;

    /**
     * @ORM\Column(name="last_name", type="string")
     * @var string
     */
    private $lastName;

    /**
     * @ORM\Embedded(class = "AppBundle\Entity\ValueObject\EmailAddress")
     * @var EmailAddress
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="user")
     * @var Post[]
     */
    private $posts;

    /**
     * User constructor.
     *
     * @param string $firstName
     * @param string $lastName
     * @param EmailAddress $email
     */
    public function __construct($firstName, $lastName, EmailAddress $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->posts = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }
}