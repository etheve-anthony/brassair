<?php

namespace App\Controller;

use App\Entity\ContactForm;
use App\Form\ContactFormType;
use App\Repository\ContactFormRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

// #[Route('/contact')]
class ContactFormController extends AbstractController
{
    #[Route('/index/contact', name: 'app_contact_form_index', methods: ['GET'])]
    public function index(ContactFormRepository $contactFormRepository): Response
    {
        return $this->render('contact_form/index.html.twig', [
            'contact_forms' => $contactFormRepository->findAll(),
        ]);
    }

    #[Route('/formulaire', name: 'app_contact_form_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContactFormRepository $contactFormRepository, MailerInterface $mailer): Response
    {
        $contactForm = new ContactForm();
        $form = $this->createForm(ContactFormType::class, $contactForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormRepository->save($contactForm, true);
            $this->addFlash('success', 'Votre message a bien été envoyé! Nous revenons vers vous très rapidement!');
            // Envoyer un e-mail
            $email = (new Email())
                ->from('contact@jardinlacour.re')
                ->to('contact@jardinlacour.re')
                ->subject('Nouveau message depuis le formulaire de contact')
                ->html('<p>' . 'Nom: ' . $contactForm->getName() . '</p>' . '<p>' . 'Sujet: ' . $contactForm->getSubject() . '</p>' . '<p>' . 'Email: ' . $contactForm->getEmail() . '</p>' . '<p>' . 'Message: ' . $contactForm->getMessage() . '</p>' . '<p>' . 'RGPD: ' . $contactForm->getRGPD() . '</p>');

            $mailer->send($email);
        }

        return $this->render('contact_form/new.html.twig', [
            'contact_form' => $contactForm,
            'form' => $form->createView(),
        ]);
    }

    #[Route('index/contact/{id}', name: 'app_contact_form_show', methods: ['GET'])]
    public function show(ContactForm $contactForm): Response
    {
        return $this->render('contact_form/show.html.twig', [
            'contact_form' => $contactForm,
        ]);
    }

    #[Route('index/contact/{id}/edit', name: 'app_contact_form_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContactForm $contactForm, ContactFormRepository $contactFormRepository): Response
    {
        $form = $this->createForm(ContactFormType::class, $contactForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormRepository->save($contactForm, true);

            return $this->redirectToRoute('app_contact_form_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact_form/edit.html.twig', [
            'contact_form' => $contactForm,
            'form' => $form->createView(),
        ]);
    }

    #[Route('index/contact/{id}', name: 'app_contact_form_delete', methods: ['POST'])]
    public function delete(Request $request, ContactForm $contactForm, ContactFormRepository $contactFormRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contactForm->getId(), $request->request->get('_token'))) {
            $contactFormRepository->remove($contactForm, true);
        }

        return $this->redirectToRoute('app_contact_form_index', [], Response::HTTP_SEE_OTHER);
    }
}
