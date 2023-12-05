<?php

namespace App\Controller;

use App\Entity\Homepage;
use App\Form\HomepageType;
use App\Repository\HomepageRepository;
use App\Repository\ProductOfferRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage_visitors', methods: ['GET'])]
    public function accueil(HomepageRepository $homepageRepository, ProductOfferRepository $productOfferRepository): Response
    {

        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        return $this->render('homepage/visitors.html.twig', [
            'homepages' => $homepageRepository->findAll(),
            'product_offer' => $productOffer,
        ]);
    }

    #[Route('/accueil/administration', name: 'app_homepage_index', methods: ['GET'])]
    public function index(HomepageRepository $homepageRepository): Response
    {
        return $this->render('homepage/index.html.twig', [
            'homepages' => $homepageRepository->findAll(),
        ]);
    }

    #[Route('/accueil/administration/nouveau', name: 'app_homepage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $homepage = new Homepage();
        $form = $this->createForm(HomepageType::class, $homepage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($homepage);
            $entityManager->flush();

            return $this->redirectToRoute('app_homepage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('homepage/new.html.twig', [
            'homepage' => $homepage,
            'form' => $form,
        ]);
    }

    #[Route('/accueil/administration/{id}', name: 'app_homepage_show', methods: ['GET'])]
    public function show(Homepage $homepage): Response
    {
        return $this->render('homepage/show.html.twig', [
            'homepage' => $homepage,
        ]);
    }

    #[Route('/accueil/administration/editer/{id}', name: 'app_homepage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Homepage $homepage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HomepageType::class, $homepage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_homepage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('homepage/edit.html.twig', [
            'homepage' => $homepage,
            'form' => $form,
        ]);
    }

    #[Route('/accueil/administration/supprimer/{id}', name: 'app_homepage_delete', methods: ['POST'])]
    public function delete(Request $request, Homepage $homepage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $homepage->getId(), $request->request->get('_token'))) {
            $entityManager->remove($homepage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_homepage_index', [], Response::HTTP_SEE_OTHER);
    }
}
