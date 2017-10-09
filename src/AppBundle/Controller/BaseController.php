<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends FOSRestController
{
    /**
     * @param Request $request
     * @param string $form
     *
     * @return mixed
     */
    public function handleRequest(Request $request, string $form)
    {
        $form = $this->createForm($form);
        $form->submit($request->request->all());

        if (!$form->isValid()) {
//            return $form->getErrors();
        }

        return $form->getData();
    }
}