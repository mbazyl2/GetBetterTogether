<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneralController extends Controller
{
    /**
     * @Route("/")
     */
     public function indexAction()
     {
         return $this->render(':default:hello.html.twig');
     }

    /**
     * @Route("/main")
     */
     public function loggedUserMain()
     {
         return $this->render(":default:main.html.twig");
     }
}
