<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Class HomeController
 *
 * @package \App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/",name="homepage")
     * */
    public function index (){
        $message = "Hello les gens";
        return $this->render('/home.html.twig', ['message' => $message]);
    }
}
