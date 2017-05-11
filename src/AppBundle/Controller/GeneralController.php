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

     /**
      * @Route("/try")
      */
     public function showAllTasks()
     {

         $taskRepo = $this->getDoctrine()->getRepository("AppBundle:Task");
         $userRepo = $this->getDoctrine()->getRepository("AppBundle:User");

         $tasks = $taskRepo->findAll();
         $users = $userRepo->findAll();

         return $this->render(":default:main.html.twig", ["tasks" => $tasks, "users" => $users]);

     }

     /**
      * @Route("/try2")
      */
     public function gettingUser()
     {
         $userName = $this->getUser()->getEmail();

         return $this->render(":default:try.html.twig", ["username"=>$userName]);
     }
}
