<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;

class Router extends AbstractController {
    public function contact(): Response {
        return $this->render('contact.html.twig');
    }
}