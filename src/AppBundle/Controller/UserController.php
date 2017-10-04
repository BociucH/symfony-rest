<?php
declare(strict_types = 1);

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class UserController extends FOSRestController
{
    /**
     * @Rest\View(serializerGroups={"user_full"})
     *
     * @return User[]
     */
    public function listAction(): array
    {
        return $this->getDoctrine()->getRepository(User::class)->findAll();
    }

    /**
     * @Rest\View(serializerGroups={"user_full"})
     *
     * @param int $id
     *
     * @return User
     */
    public function readAction(int $id): User
    {
        return $this->getDoctrine()->getRepository(User::class)->find($id);
    }
}