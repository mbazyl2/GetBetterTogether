<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneralController extends Controller
{
    /**
     * @Route("\")
     */
     public function numberAction()
     {
         $number = mt_rand(0, 100);

         return $this->render(':default:hello.html.twig');
     }

    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
