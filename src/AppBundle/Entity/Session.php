<?php

namespace AppBundle\Entity;

use AppBundle\Entity\ValueObject\Bearer;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\SessionRepository")
 * @ORM\Table(name="session")
 */
class Session implements UserInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @var int
     */
    private $id;

    /**
     * @ORM\Embedded(class="AppBundle\Entity\ValueObject\Bearer")
     * @var Bearer
     */
    private $accessToken;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="loggedAs")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     * @var User
     */
    private $user;

    /**
     * Session constructor.
     * @param int $id
     * @param Bearer $accessToken
     */
    public function __construct($id, Bearer $accessToken)
    {
        $this->id = $id;
        $this->accessToken = $accessToken;
    }

    public function getRoles()
    {
        return $this->user->getRoles();
    }

    public function getPassword()
    {
        return '';
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->user->getUsername();
    }

    public function eraseCredentials()
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Bearer
     */
    public function getAccessToken(): Bearer
    {
        return $this->accessToken;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}