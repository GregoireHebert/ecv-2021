<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Message;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @Route(path="/contact", name="contact")
 */
final class ContactController extends AbstractController
{
    public function __invoke(Request $request, MailerInterface $mailer)
    {
        $contact = new Contact();
        $builder = $this->createFormBuilder($contact)
            ->add('subject')
            ->add('name')
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
            ->add('submit', SubmitType::class);

        $form = $builder->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $mailer->send(
                (new Email())->to('gregoire@les-tilleuls.coop')
                ->from($contact->email)
                ->subject(sprintf('%s - from %s', $contact->subject, $contact->name))
                ->text($contact->message)
            );

            $this->addFlash('notice', 'Message envoyé');
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact.html.twig', ['form'=>$form->createView()]);
    }
}
