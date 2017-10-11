<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="post")
 */
class Post
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="content", type="text")
     * @var string
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @var User
     */
    private $user;

    /**
     * Post constructor.
     *
     * @param int $id
     * @param string $content
     * @param User $user
     */
    public function __construct($content, User $user)
    {
        $this->content = $content;
        $this->user = $user;
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
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }
}