<?php

namespace miercolesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * inicio controller.
 *
 */
class inicioController extends Controller
{


    public function indexAction()
    {
        return $this->render('inicio/index.html.twig');
    }
    
    
    
}
