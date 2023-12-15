<?php

namespace App\Controller;

use App\Entity\ImageFile;
use App\Form\ImageFileType;
use App\Repository\ImageFileRepository;
use App\Repository\ContactInfosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/image/fichier')]
class ImageFileController extends AbstractController
{
    #[Route('/', name: 'app_image_file_index', methods: ['GET'])]
    public function index(ImageFileRepository $imageFileRepository, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        return $this->render('image_file/index.html.twig', [
            'image_files' => $imageFileRepository->findAll(),
            'contact' => $contactContent,
        ]);
    }

    #[Route('/nouveau', name: 'app_image_file_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ImageFileRepository $imageFileRepository, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $imageFile = new ImageFile();
        $form = $this->createForm(ImageFileType::class, $imageFile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFileRepository->save($imageFile, true);

            return $this->redirectToRoute('app_image_file_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('image_file/new.html.twig', [
            'image_file' => $imageFile,
            'form' => $form->createView(),
            'contact' => $contactContent,
        ]);
    }

    #[Route('/{id}', name: 'app_image_file_show', methods: ['GET'])]
    public function show(ImageFile $imageFile, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        return $this->render('image_file/show.html.twig', [
            'image_file' => $imageFile,
            'contact' => $contactContent,
        ]);
    }

    #[Route('/{id}/editer', name: 'app_image_file_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ImageFile $imageFile, ImageFileRepository $imageFileRepository, ContactInfosRepository $contactInfosRepository): Response
    {
        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $imageId = $imageFile->getId();
        $form = $this->createForm(ImageFileType::class, $imageFile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFileRepository->save($imageFile, true);

            return $this->redirectToRoute('app_image_file_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('image_file/edit.html.twig', [
            'image_file' => $imageFile,
            'form' => $form->createView(),
            'image_id' => $imageId,
            'contact' => $contactContent,
        ]);
    }

    #[Route('/{id}', name: 'app_image_file_delete', methods: ['POST'])]
    public function delete(Request $request, ImageFile $imageFile, ImageFileRepository $imageFileRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $imageFile->getId(), $request->request->get('_token'))) {
            $imageFileRepository->remove($imageFile, true);
        }

        return $this->redirectToRoute('app_image_file_index', [], Response::HTTP_SEE_OTHER);
    }
}
