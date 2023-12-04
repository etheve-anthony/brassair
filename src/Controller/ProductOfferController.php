<?php

namespace App\Controller;

use App\Entity\ProductOffer;
use App\Form\ProductOfferType;
use App\Repository\ProductOfferRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/product/offer')]
class ProductOfferController extends AbstractController
{
    #[Route('/', name: 'app_product_offer_index', methods: ['GET'])]
    public function index(ProductOfferRepository $productOfferRepository): Response
    {
        return $this->render('product_offer/index.html.twig', [
            'product_offers' => $productOfferRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_product_offer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $productOffer = new ProductOffer();
        $form = $this->createForm(ProductOfferType::class, $productOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($productOffer);
            $entityManager->flush();

            return $this->redirectToRoute('app_product_offer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('product_offer/new.html.twig', [
            'product_offer' => $productOffer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_product_offer_show', methods: ['GET'])]
    public function show(ProductOffer $productOffer): Response
    {
        return $this->render('product_offer/show.html.twig', [
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_product_offer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ProductOffer $productOffer, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProductOfferType::class, $productOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_product_offer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('product_offer/edit.html.twig', [
            'product_offer' => $productOffer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_product_offer_delete', methods: ['POST'])]
    public function delete(Request $request, ProductOffer $productOffer, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$productOffer->getId(), $request->request->get('_token'))) {
            $entityManager->remove($productOffer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_product_offer_index', [], Response::HTTP_SEE_OTHER);
    }
}
