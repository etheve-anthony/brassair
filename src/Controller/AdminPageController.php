<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use App\Entity\User;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use App\Repository\ProductOfferRepository;
use App\Repository\ContactInfosRepository;

class AdminPageController extends AbstractController
{
    #[Route('/administration/brassair', name: 'app_admin_page')]
    public function index(TokenStorageInterface $tokenStorage, AuthorizationCheckerInterface $authChecker, EntityManagerInterface $entityManager, ProductOfferRepository $productOfferRepository, ContactInfosRepository $contactInfosRepository): Response
    {

        // Récupération du contenu du bandeau promotionnel
        $promoContent = $productOfferRepository->findBy([], ['id' => 'DESC'], 1);
        $productOffer = $promoContent[0] ?? null;

        // Récupération des informations de contact
        $contactContent = $contactInfosRepository->findAll();
        $contactContent = $contactContent[0] ?? null;

        $roles = '';
        $firstName = '';

        if ($authChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            // L'utilisateur est connecté
            /** @var Users $user */
            $user = $tokenStorage->getToken()->getUser();
            $roles = $user->getRoles();
            $roles = $roles[0];
            $firstName = $user->getFirstName();
        }

        $role_admin = 'ROLE_ADMIN';
        $role_secretaire = 'ROLE_USER_SEC';

        return $this->render('admin_page/index.html.twig', [
            'statuts' => $roles,
            'admin' => $role_admin,
            'secretaire' => $role_secretaire,
            'prenom' => $firstName,
            'product_offer' => $productOffer,
            'contact' => $contactContent,
        ]);
    }
}
