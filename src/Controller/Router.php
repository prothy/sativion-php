<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Router extends AbstractController {
//    #[Route('/')]
    public function index(): Response {
        return $this->render('home.html.twig');
    }
}