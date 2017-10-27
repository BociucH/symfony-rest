<?php

namespace AppBundle\Entity;

use AppBundle\Entity\ValueObject\EmailAddress;
use AppBundle\Entity\ValueObject\PasswordHash;
use AppBundle\Entity\ValueObject\SaltHash;
use AppBundle\Entity\ValueObject\UserRole;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="\AppBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="first_name", type="string", nullable=true)
     * @var string
     */
    private $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", nullable=true)
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
     * @ORM\Embedded(class="AppBundle\Entity\ValueObject\UserRole")
     * @var UserRole
     */
    private $role;

    /**
     * @ORM\Embedded(class="AppBundle\Entity\ValueObject\PasswordHash")
     * @var PasswordHash
     */
    private $passwordHash;

    /**
     * @ORM\Embedded(class="AppBundle\Entity\ValueObject\SaltHash")
     * @var SaltHash
     */
    private $salt;

    /**
     * @ORM\OneToMany(targetEntity="Session", mappedBy="user")
     */
    private $loggedAs;

    /**
     * User constructor.
     *
     * @param SaltHash $salt
     */
    public function __construct(SaltHash $salt)
    {
        $this->salt = $salt;
        $this->posts = new ArrayCollection();
    }

    public function getRoles()
    {
        return [(string) $this->role];
    }

    public function getPassword()
    {
        return $this->passwordHash;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getUsername()
    {
        return '';
    }

    public function eraseCredentials()
    {
        return;
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

    /**
     * @return UserRole
     */
    public function getRole(): UserRole
    {
        return $this->role;
    }

    /**
     * @param UserRole $role
     */
    public function setRole(UserRole $role)
    {
        $this->role = $role;
    }

    /**
     * @return PasswordHash
     */
    public function getPasswordHash(): PasswordHash
    {
        return $this->passwordHash;
    }

    /**
     * @param PasswordHash $passwordHash
     */
    public function setPassword(PasswordHash $passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * @return mixed
     */
    public function getLoggedAs()
    {
        return $this->loggedAs;
    }

    /**
     * @param mixed $loggedAs
     */
    public function setLoggedAs($loggedAs)
    {
        $this->loggedAs = $loggedAs;
    }
}