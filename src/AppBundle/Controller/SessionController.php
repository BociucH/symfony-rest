<?php

namespace AppBundle\Controller;

use AppBundle\CommandBus\UserLoginCommand;
use AppBundle\Entity\Session;
use AppBundle\Entity\ValueObject\Bearer;
use AppBundle\Form\LoginFormData;
use AppBundle\Form\LoginFormType;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class SessionController extends BaseController
{
    /**
     * @Rest\View(serializerGroups={"session"})
     *
     * @param Request $request
     *
     * @return Session|null
     */
    public function loginAction(Request $request)
    {
        /** @var LoginFormData $data */
        $data = $this->handleRequest($request, LoginFormType::class);
        $bearer = new Bearer();

        $userLoginCommand = new UserLoginCommand(
            $data->login,
            $data->password,
            $bearer
        );

        $this->container->get('tactician.commandbus')->handle($userLoginCommand);
        $this->getDoctrine()->getManager()->flush();

        $session = $this->getDoctrine()->getManager()->getRepository(Session::class)
            ->findByToken($bearer);

        return $session;
    }
}