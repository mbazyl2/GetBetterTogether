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
         // sprawdzenie czy jest zalogowany admin/user/niezalogowany -> 3 sciezki na ktore przekierowuje
     }

    /**
     * @Route("/allUsers")
     */
    public function allUserAction()
    {
        // showing all users in system
        $users = $this->getDoctrine()->getRepository("AppBundle:User")->findAll();
        return $this->render(":default:main.html.twig", ["users" => $users]);
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

         // showing all users and tasks
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
         $userName = $this->getUser()->getId();

         return $this->render(":default:try.html.twig", ["username"=>$userName]);
     }
}
