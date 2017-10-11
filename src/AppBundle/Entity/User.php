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
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
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
     * @return Post[]
     */
    public function getPosts(): array
    {
        return $this->posts;
    }

    /**
     * @param Post[] $posts
     */
    public function setPosts(array $posts)
    {
        $this->posts = $posts;
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