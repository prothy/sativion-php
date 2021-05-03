<?php
namespace App\Controller;

use App\Form\ContactEmailType;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController {
    public function contact(Request $request, MailerInterface $mailer, TranslatorInterface $translator): Response {
        $form = $this->createForm(ContactEmailType::class, null, [
            'attr' => ['class' => 'contact-form', 'onsubmit' => 'return formValidate();']
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $message = (new Email())
                ->from($formData['email'])
                ->to('lukacsurgay@gmail.com')
                ->subject('Message from ' . $formData['name'])
                ->text($formData['message'])
            ;

            try {
                $this->addFlash('sent', $translator->trans('form.success'));
                $mailer->send($message);
                return $this->redirect($this->generateUrl('contact'));
            } catch (TransportExceptionInterface $e) {
                $this->addFlash('fail', $translator->trans('form.fail'));
            }
        }


        return $this->render('contact.html.twig', [
            'contact_form' => $form->createView()
        ]);
    }
}