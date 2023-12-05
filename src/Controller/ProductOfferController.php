<?php

namespace App\Controller;

use App\Entity\ProductOffer;
use App\Form\ProductOfferType;
use App\Repository\ProductOfferRepository;
use App\Repository\ContactInfosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/annonces')]
class ProductOfferController extends AbstractController
{
    // Index des offres pour les admins
    #[Route('/', name: 'app_product_offer_index', methods: ['GET'])]
    public function index(ProductOfferRepository $productOfferRepository, ContactInfosRepository $contactInfosRepository): Response
    {

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        return $this->render('product_offer/index.html.twig', [
            'product_offers' => $productOfferRepository->findBy(
                [],
                ['id' => 'DESC'],
                30
            ),
            'contact' => $contactContent,
        ]);
    }

    // Index des anciennes offres pour les visiteurs
    #[Route('/anciennes-offres', name: 'app_product_offer_index_visitors', methods: ['GET'])]
    public function indexVisitors(ProductOfferRepository $productOfferRepository, ContactInfosRepository $contactInfosRepository): Response
    {

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;
        return $this->render('product_offer/index_visitors.html.twig', [
            'product_offers' => $productOfferRepository->findBy(
                [],
                ['id' => 'DESC'],
                10
            ),
            'contact' => $contactContent,
        ]);
    }

    #[Route('/nouveau', name: 'app_product_offer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, ContactInfosRepository $contactInfosRepository): Response
    {

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $productOffer = new ProductOffer();
        $form = $this->createForm(ProductOfferType::class, $productOffer);
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
            $productOffer->setSlug($slug);
            // On enregistre en base de données
            $entityManager->persist($productOffer);
            $entityManager->flush();

            return $this->redirectToRoute('app_product_offer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('product_offer/new.html.twig', [
            'product_offer' => $productOffer,
            'form' => $form,
            'contact' => $contactContent,
        ]);
    }

    // #[Route('/{id}', name: 'app_product_offer_show', methods: ['GET'])]
    // public function show(ProductOffer $productOffer): Response
    // {
    //     return $this->render('product_offer/show.html.twig', [
    //         'product_offer' => $productOffer,
    //     ]);
    // }

    #[Route('/offres/{slug}', name: 'app_product_offer_visitors', methods: ['GET'])]
    public function showToVisitors(string $slug, ProductOffer $productOffer, ProductOfferRepository $productOfferRepository, ContactInfosRepository $contactInfosRepository): Response
    {

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $productOffer = $productOfferRepository->findOneBy(['slug' => $slug]);

        if (!$productOffer) {
            throw $this->createNotFoundException('No product offer found for slug ' . $slug);
        }

        return $this->render('product_offer/show_visitors.html.twig', [
            'product_offer' => $productOffer,
            'contact' => $contactContent,
        ]);
    }

    #[Route('/{slug}/modifier', name: 'app_product_offer_edit', methods: ['GET', 'POST'])]
    public function edit(string $slug, Request $request, ProductOffer $productOffer, EntityManagerInterface $entityManager, ProductOfferRepository $productOfferRepository, ContactInfosRepository $contactInfosRepository): Response
    {

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $productOffer = $productOfferRepository->findOneBy(['slug' => $slug]);

        $form = $this->createForm(ProductOfferType::class, $productOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_product_offer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('product_offer/edit.html.twig', [
            'product_offer' => $productOffer,
            'form' => $form,
            'contact' => $contactContent,
        ]);
    }

    #[Route('/{id}', name: 'app_product_offer_delete', methods: ['POST'])]
    public function delete(Request $request, ProductOffer $productOffer, EntityManagerInterface $entityManager): Response
    {

        if ($this->isCsrfTokenValid('delete' . $productOffer->getId(), $request->request->get('_token'))) {
            $entityManager->remove($productOffer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_product_offer_index', [], Response::HTTP_SEE_OTHER);
    }
}
