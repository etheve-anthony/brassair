<?php

namespace App\Controller;

use App\Entity\Kitchen;
use App\Form\KitchenType;
use App\Repository\KitchenRepository;
use App\Repository\ProductOfferRepository;
use App\Repository\ContactInfosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cuisines')]
class KitchenController extends AbstractController
{
    #[Route('/', name: 'app_kitchen_index', methods: ['GET'])]
    public function index(KitchenRepository $kitchenRepository, ProductOfferRepository $productOfferRepository, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        return $this->render('kitchen/index.html.twig', [
            'kitchens' => $kitchenRepository->findAll(),
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('/nouveau', name: 'app_kitchen_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, ProductOfferRepository $productOfferRepository, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $kitchen = new Kitchen();
        $form = $this->createForm(KitchenType::class, $kitchen);
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
            $kitchen->setSlug($slug);
            // On enregistre en base de données
            $entityManager->persist($kitchen);
            $entityManager->flush();

            return $this->redirectToRoute('app_kitchen_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('kitchen/new.html.twig', [
            'kitchen' => $kitchen,
            'form' => $form,
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('/style/{slug}', name: 'app_kitchen_show', methods: ['GET'])]
    public function show(string $slug, Kitchen $kitchen, ProductOfferRepository $productOfferRepository, KitchenRepository $kitchenRepository, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $kitchen = $kitchenRepository->findOneBy(['slug' => $slug]);

        if (!$kitchen) {
            throw $this->createNotFoundException('Pas de cuisines trouvées pour le slug ' . $slug);
        }

        return $this->render('kitchen/show.html.twig', [
            'kitchen' => $kitchen,
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('/{slug}/modifier', name: 'app_kitchen_edit', methods: ['GET', 'POST'])]
    public function edit(string $slug, Request $request, Kitchen $kitchen, KitchenRepository $kitchenRepository, EntityManagerInterface $entityManager, ProductOfferRepository $productOfferRepository, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $kitchen = $kitchenRepository->findOneBy(['slug' => $slug]);

        $form = $this->createForm(KitchenType::class, $kitchen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_kitchen_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('kitchen/edit.html.twig', [
            'kitchen' => $kitchen,
            'form' => $form,
            'contact' => $contactContent,
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('/{id}', name: 'app_kitchen_delete', methods: ['POST'])]
    public function delete(Request $request, Kitchen $kitchen, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $kitchen->getId(), $request->request->get('_token'))) {
            $entityManager->remove($kitchen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_kitchen_index', [], Response::HTTP_SEE_OTHER);
    }
}
