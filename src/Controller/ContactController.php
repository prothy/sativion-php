<?php
namespace App\Controller;

use App\Form\ContactEmailType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;

class ContactController extends AbstractController {
    public function contact(Request $request, MailerInterface $mailer): Response {
        $form = $this->createForm(ContactEmailType::class, null, [
            'attr' => ['class' => 'contact-form']
        ]);

        return $this->render('contact.html.twig', [
            'contact_form' => $form->createView()
        ]);
    }
}