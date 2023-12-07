<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContactInfosRepository;
use App\Repository\ProductOfferRepository;

class LegalPagesController extends AbstractController
{
    #[Route('/mentions_legales', name: 'app_mentions_legales')]
    public function mentionsLegales(ContactInfosRepository $contactInfosRepository, ProductOfferRepository $productOfferRepository): Response
    {
        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        return $this->render('legal_pages/mentions_legales.html.twig', [
            'controller_name' => 'LegalPagesController',
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }
    #[Route('/politique_de_confidentialite', name: 'app_politique_confidentialite')]
    public function politiqueDeConfidentialite(ContactInfosRepository $contactInfosRepository, ProductOfferRepository $productOfferRepository): Response
    {
        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        return $this->render('legal_pages/politique_confidentialite.html.twig', [
            'controller_name' => 'LegalPagesController',
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }
}
