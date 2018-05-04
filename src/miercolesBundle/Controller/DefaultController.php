<?php

namespace miercolesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('miercolesBundle:Default:index.html.twig');
    }
    

}
