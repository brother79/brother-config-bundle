<?php

namespace Application\ConfigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ApplicationConfigBundle:Default:index.html.twig', array('name' => $name));
    }
}
