<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductOfferRepository;
use App\Repository\ContactInfosRepository;

class ServiceController extends AbstractController
{
    #[Route('/brassair/service', name: 'app_service')]
    public function index(ProductOfferRepository $productOfferRepository, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        return $this->render('service/index.html.twig', [
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }
}
