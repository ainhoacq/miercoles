<?php

namespace miercolesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * contacto controller.
 *
 */
class contactoController extends Controller
{


    public function indexAction()
    {
        return $this->render('contacto/index.html.twig');
    }
    
    
    
}
