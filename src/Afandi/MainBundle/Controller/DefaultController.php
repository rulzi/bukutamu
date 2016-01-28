<?php

namespace Afandi\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AfandiMainBundle:Default:index.html.twig');
    }
}
