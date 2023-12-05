<?php

namespace App\Controller;

use App\Entity\ContactInfos;
use App\Form\ContactInfosType;
use App\Repository\ContactInfosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contact/infos')]
class ContactInfosController extends AbstractController
{
    #[Route('/', name: 'app_contact_infos_index', methods: ['GET'])]
    public function index(ContactInfosRepository $contactInfosRepository): Response
    {

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;


        return $this->render('contact_infos/index.html.twig', [
            'contact_infos' => $contactInfosRepository->findAll(),
            'contact' => $contactContent,
        ]);
    }

    #[Route('/new', name: 'app_contact_infos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $contactInfo = new ContactInfos();
        $form = $this->createForm(ContactInfosType::class, $contactInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contactInfo);
            $entityManager->flush();

            return $this->redirectToRoute('app_contact_infos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact_infos/new.html.twig', [
            'contact_info' => $contactInfo,
            'form' => $form,
            'contact' => $contactContent,
        ]);
    }

    #[Route('/{id}', name: 'app_contact_infos_show', methods: ['GET'])]
    public function show(ContactInfos $contactInfo, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        return $this->render('contact_infos/show.html.twig', [
            'contact_info' => $contactInfo,
            'contact' => $contactContent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contact_infos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContactInfos $contactInfo, EntityManagerInterface $entityManager, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $form = $this->createForm(ContactInfosType::class, $contactInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contact_infos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact_infos/edit.html.twig', [
            'contact_info' => $contactInfo,
            'form' => $form,
            'contact' => $contactContent,
        ]);
    }

    #[Route('/{id}', name: 'app_contact_infos_delete', methods: ['POST'])]
    public function delete(Request $request, ContactInfos $contactInfo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contactInfo->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contactInfo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contact_infos_index', [], Response::HTTP_SEE_OTHER);
    }
}
