<?php

namespace App\Form;

use App\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Validator\Constraints as Assert;


class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Nom, prénom...'
                ],
                'label' => 'Nom/Prénom'
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Votre e-mail...'
                ],
                'label' => 'E-mail'
            ])
            ->add('telephone', TelType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Votre numéro de téléphone'
                ],
                'label' => 'Numéro de téléphone',
                'constraints' => [
                    new Assert\Regex([
                        'pattern' => '/^[0-9]{10}$/',
                        'message' => 'Veuillez entrer un numéro de téléphone valide sans caractères spéciaux et de 10 chiffres (ex: 0692424344).'
                    ]),
                    new Assert\Length([
                        'min' => 10,
                        'max' => 10,
                        'exactMessage' => 'Le numéro de téléphone doit contenir exactement 10 chiffres (ex: 0692424344).'
                    ])
                ]
            ])
            ->add('subject', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Indiquez un sujet...'
                ],
                'label' => 'Sujet'
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Votre demande...',
                    'rows' => 5,
                ],
                'label' => 'Message'
            ])->add('RGPD', CheckboxType::class, [
                'label' => 'En cochant cette case et en soumettant ce formulaire, j’accepte que mes données personnelles soient utilisées pour me recontacter dans le cadre de ma demande ci jointe.',
                'required' => true,
                'attr' => [
                    'class' => 'form-check-input mb-3',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
        ]);
    }
}
