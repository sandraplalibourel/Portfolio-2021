<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;



class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();

            $email = (new Email())
                ->from('e740c2b349-44616e@inbox.mailtrap.io')
                ->to('e740c2b349-44616e@inbox.mailtrap.io')
                ->subject('Demande de contact via portfolio')
                ->text('Sender : '. $contactFormData['email'] . \PHP_EOL .
                    $contactFormData['message']);

            $mailer->send($email);

            return $this->redirectToRoute('contact');
        }


        return $this->render('contact/index.html.twig', [
            'contact_form' => $form->createView()
        ]);
    }
}
