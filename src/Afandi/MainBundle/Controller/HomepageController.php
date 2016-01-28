<?php

namespace Afandi\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    public function indexAction()
    {
        return $this->render('AfandiMainBundle:Homepage:index.html.twig', array(
            // ...
        ));
    }

}
