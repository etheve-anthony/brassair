<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Form\RegistrationFormTypeEdit;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

#[Route('/inscription', name: 'app_register_')]
class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    #[Route('/collaborateur', name: 'staff')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            // $this->emailVerifier->sendEmailConfirmation(
            //     'app_verify_email',
            //     $user,
            //     (new TemplatedEmail())
            //         ->from(new Address('contact@robertcuisines.fr', 'Robert Cuisines'))
            //         ->to($user->getEmail())
            //         ->subject('Veuillez confirmer votre e-mail')
            //         ->htmlTemplate('registration/confirmation_email.html.twig')
            // );

            $this->addFlash('success', 'Le collaborateur est enregistré! Bienvenue à lui!');
            return $this->redirectToRoute('app_homepage_visitors');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    // #[Route('/verification/e-mail', name: 'app_verify_email')]
    // public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    // {
    //     $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

    //     // validate email confirmation link, sets User::isVerified=true and persists
    //     try {
    //         $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
    //     } catch (VerifyEmailExceptionInterface $exception) {
    //         $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

    //         return $this->redirectToRoute('app_register');
    //     }

    //     // @TODO Change the redirect on success and handle or remove the flash message in your templates
    //     $this->addFlash('success', 'Votre e-mail a été verifié.');

    //     return $this->redirectToRoute('app_register');
    // }

    // Fonction pour lire tous les utilisateurs admins et secrétaires
    #[Route('/liste-utilisateurs', name: 'listing')]
    public function show(Request $request, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(User::class)->getAllUsers();

        return $this->render('registration/listing.html.twig', [
            'items' => $repository,
        ]);
    }

    // Fonction pour modifier son profil personnel
    #[Route('/profil', name: 'profil')]
    public function profil(Request $request, EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        // On récupère l'utilisateur connecté
        /** @var User $user */
        $user = $tokenStorage->getToken()->getUser();
        // $email = $user->getEmail();
        // $user_email = $email;
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $roles = $user->getRoles();
        $roles = $roles[0];

        $form = $this->createForm(RegistrationFormTypeEdit::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email
            $this->addFlash('success', 'Vos modifications sont enregistrées!');

            return $this->redirectToRoute('app_admin_page');
        }

        return $this->render('registration/profil.html.twig', [
            'registrationForm' => $form,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'role' => $roles,
        ]);
    }
    // Fonction d'édition des utilisateurs (pour l'admin)
    #[Route('/edition/{id}', name: 'edit')]
    public function edit(User $user, Request $request, EntityManagerInterface $em): Response
    {

        $form = $this->createForm(EditUsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Utilisateur modifié avec succès!');

            // On redirige
            return $this->redirectToRoute('app_register_listing');
        }


        return $this->render('registration/edit.html.twig', [
            'user' => $form->createView(),
        ]);
    }

    // Fonction pour supprimer des utilisateurs (admin)
    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(User $user, Request $request, EntityManagerInterface $em): Response
    {

        $form = $this->createForm(RemoveUsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->remove($user);
            $em->flush();

            $this->addFlash('success', 'Utilisateur supprimé avec succès');

            // On redirige
            return $this->redirectToRoute('app_register_listing');
        }

        return $this->render('registration/delete.html.twig', [
            'user' => $form->createView(),
        ]);
    }
}
