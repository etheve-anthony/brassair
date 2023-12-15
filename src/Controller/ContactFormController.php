<?php

namespace App\Controller;

use App\Entity\ContactForm;
use App\Form\ContactFormType;
use App\Repository\ContactFormRepository;
use App\Repository\ProductOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Repository\ContactInfosRepository;

// #[Route('/contact')]
class ContactFormController extends AbstractController
{
    #[Route('/index/contact', name: 'app_contact_form_index', methods: ['GET'])]
    public function index(ContactFormRepository $contactFormRepository, ContactInfosRepository $contactInfosRepository, ProductOfferRepository $productOfferRepository): Response
    {
        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        return $this->render('contact_form/index.html.twig', [
            'contact_forms' => $contactFormRepository->findAll(),
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('/formulaire', name: 'app_contact_form_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContactFormRepository $contactFormRepository, MailerInterface $mailer, ContactInfosRepository $contactInfosRepository, ProductOfferRepository $productOfferRepository): Response
    {

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        $contactForm = new ContactForm();
        $form = $this->createForm(ContactFormType::class, $contactForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormRepository->save($contactForm, true);
            $this->addFlash('success', 'Votre message a bien été envoyé! Nous revenons vers vous très rapidement!');
            // Envoyer un e-mail
            $email = (new Email())
                ->from('contact@robertcuisines.fr')
                ->to('contact@robertcuisines.fr')
                ->cc('anthony@contenucreation.fr')
                ->subject('Nouveau message reçu sur robertcuisines.fr')
                ->html('<p>' . 'Nom: ' . $contactForm->getName() . '</p>' . '<p>' . 'Sujet: ' . $contactForm->getSubject() . '</p>' . '<p>' . 'Email: ' . $contactForm->getEmail() . '</p>' . '<p>' . 'Tel: ' . $contactForm->getTelephone() . '<p>' . 'Type de demande: ' . $contactForm->getRequest() . '</p>' . '</p>' . '<p>' . 'Message: ' . $contactForm->getMessage() . '</p>' . '<p>' . 'RGPD: ' . $contactForm->getRGPD() . '</p>');

            // Gestion de la pièce jointe (attachée dans l'e-mail)
            $attachmentFile = $form->get('attachedFile')->getData();
            if ($attachmentFile) {
                $email->attachFromPath($attachmentFile->getRealPath(), $attachmentFile->getClientOriginalName(), $attachmentFile->getMimeType());
            }

            $mailer->send($email);
        }

        return $this->render('contact_form/new.html.twig', [
            'contact_form' => $contactForm,
            'form' => $form->createView(),
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('index/contact/{id}', name: 'app_contact_form_show', methods: ['GET'])]
    public function show(ContactForm $contactForm, ContactInfosRepository $contactInfosRepository, ProductOfferRepository $productOfferRepository): Response
    {
        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        return $this->render('contact_form/show.html.twig', [
            'contact_form' => $contactForm,
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('index/contact/{id}/edit', name: 'app_contact_form_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContactForm $contactForm, ContactFormRepository $contactFormRepository, ContactInfosRepository $contactInfosRepository, ProductOfferRepository $productOfferRepository): Response
    {

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        $form = $this->createForm(ContactFormType::class, $contactForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormRepository->save($contactForm, true);

            return $this->redirectToRoute('app_contact_form_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact_form/edit.html.twig', [
            'contact_form' => $contactForm,
            'form' => $form->createView(),
            'contact' => $contactContent,
            'product_offer' => $productOffer,
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
