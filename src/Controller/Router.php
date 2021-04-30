<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Router extends AbstractController {
    #[Route('/')]
    public function index(): Response {
        return $this->render('home.html.twig');
    }

    #[Route('/contact')]
    public function contact(): Response {
        return $this->render('contact.html.twig');
    }
}