<?php

namespace App\Controller;

use App\Entity\Application;
use App\Form\ApplicationType;
use App\Repository\ApplicationRepository;
use App\Repository\ProductOfferRepository;
use App\Repository\ContactInfosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{
    #[Route('/application/administration', name: 'app_application_index', methods: ['GET'])]
    public function index(ApplicationRepository $applicationRepository, ProductOfferRepository $productOfferRepository, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        return $this->render('application/index.html.twig', [
            'applications' => $applicationRepository->findAll(),
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('/application/nouveau', name: 'app_application_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, ProductOfferRepository $productOfferRepository, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $application = new Application();
        $form = $this->createForm(ApplicationType::class, $application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Fabrication du slug
            $slug = $form->getData()->getTitle();
            // To lower case
            $slug = strtolower($slug);
            // On cherche le premier espace
            $positionPremierEspace = strpos($slug, ' ');
            if ($positionPremierEspace !== false) {
                $slug = substr_replace($slug, '-', $positionPremierEspace, 1);
            }
            // On remplace les espaces par des tirets
            $slug = str_replace(' ', '-', $slug);
            // On set le slug
            $application->setSlug($slug);
            // On enregistre en base de données
            $entityManager->persist($application);
            $entityManager->flush();

            return $this->redirectToRoute('app_application_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('application/new.html.twig', [
            'application' => $application,
            'form' => $form,
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('/{slug}', name: 'app_application_show', methods: ['GET'])]
    public function show(string $slug, Application $application, ProductOfferRepository $productOfferRepository, ApplicationRepository $applicationRepository, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $application = $applicationRepository->findOneBy(['slug' => $slug]);

        if (!$application) {
            throw $this->createNotFoundException('Pas de cuisines trouvées pour le slug ' . $slug);
        }

        return $this->render('application/show.html.twig', [
            'application' => $application,
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('/application/{slug}/modifier', name: 'app_application_edit', methods: ['GET', 'POST'])]
    public function edit(string $slug, Request $request, Application $application, ApplicationRepository $applicationRepository, EntityManagerInterface $entityManager, ProductOfferRepository $productOfferRepository, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $application = $applicationRepository->findOneBy(['slug' => $slug]);

        $form = $this->createForm(ApplicationType::class, $application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_application_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('application/edit.html.twig', [
            'application' => $application,
            'form' => $form,
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('/application/{id}', name: 'app_application_delete', methods: ['POST'])]
    public function delete(Request $request, Application $application, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $application->getId(), $request->request->get('_token'))) {
            $entityManager->remove($application);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_application_index', [], Response::HTTP_SEE_OTHER);
    }
}
