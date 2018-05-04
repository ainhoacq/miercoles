<?php

namespace miercolesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * nosotros controller.
 *
 */
class nosotrosController extends Controller
{


    public function indexAction()
    {
        return $this->render('nosotros/index.html.twig');
    }
    
    
    
}
