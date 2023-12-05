<?php

namespace App\Controller;

use App\Entity\ImageFile;
use App\Form\ImageFileType;
use App\Repository\ImageFileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/image/file')]
class ImageFileController extends AbstractController
{
    #[Route('/', name: 'app_image_file_index', methods: ['GET'])]
    public function index(ImageFileRepository $imageFileRepository): Response
    {
        return $this->render('image_file/index.html.twig', [
            'image_files' => $imageFileRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_image_file_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ImageFileRepository $imageFileRepository): Response
    {
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
        ]);
    }

    #[Route('/{id}', name: 'app_image_file_show', methods: ['GET'])]
    public function show(ImageFile $imageFile): Response
    {
        return $this->render('image_file/show.html.twig', [
            'image_file' => $imageFile,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_image_file_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ImageFile $imageFile, ImageFileRepository $imageFileRepository): Response
    {
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
