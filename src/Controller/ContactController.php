<?php


namespace App\Controller;

use App\Form\ContactType;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer,FlashyNotifier $flashy)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            
            $message = (new Email())
                ->from('contact@hollyfx-makeup.fr')
                ->to('contact@hollyfx-makeup.fr')
                ->subject('vous avez reçu un email de '.$contactFormData['fullName'])
                ->text('Sender : '.$contactFormData['email'].\PHP_EOL.'PhoneNumber : '.$contactFormData['phoneNumber'].\PHP_EOL.
                    'Object : '. $contactFormData['object'].\PHP_EOL.
                    'Message : '.$contactFormData['message'],
                    'text/plain');
            try {
                $mailer->send($message);
                $flashy->success(' Votre message a été envoyé');


            } catch (TransportExceptionInterface $e){
                $flashy->error($e);

                return $this->redirectToRoute('contact');
            }

        }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
}