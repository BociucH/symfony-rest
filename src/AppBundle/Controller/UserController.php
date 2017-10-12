<?php
declare(strict_types = 1);

namespace AppBundle\Controller;

use AppBundle\CommandBus\AddUserCommand;
use AppBundle\Entity\User;
use AppBundle\Form\UserData;
use AppBundle\Form\UserType;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Form\FormErrorIterator;
use Symfony\Component\HttpFoundation\Request;

class UserController extends BaseController
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

    public function createAction(Request $request)
    {
        //?XDEBUG_SESSION_START=PHPSTORM

        /** @var UserData $data */
        $data = $this->handleRequest($request, UserType::class);

        if ($data instanceof FormErrorIterator) {
            throw new \Exception($data->__toString());
        }

        $addUserCommand = new AddUserCommand($data->email);
        $addUserCommand->setFirstName($data->firstName);
        $addUserCommand->setLastName($data->lastName);

        $this->container->get('tactician.commandbus')->handle($addUserCommand);
        $this->getDoctrine()->getManager()->flush();

        return $data;
    }
}