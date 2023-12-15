<?php

namespace App\Form;

use App\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Email as EmailConstraint;


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
                'label' => 'Nom/Prénom',
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Votre e-mail...'
                ],
                'label' => 'E-mail',
                'required' => true,
                'constraints' => [
                    new EmailConstraint([
                        'message' => 'L\'adresse e-mail n\'est pas valide.',
                    ]),
                ],
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
                ],
                'required' => true,
            ])
            ->add('request', ChoiceType::class, [
                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                    'Demande de devis' => 'devis',
                    'Demande de stage/candidature' => 'stage/emploi',
                    'Autres' => 'autres',
                ],
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'label' => 'Type de demande',
                'placeholder' => 'Sélectionnez le type de demande'
            ])
            ->add('attachedFile', FileType::class, [
                'label' => 'Fichier à joindre (plan de cuisine, CV, autres)',
                'attr' => [
                    'class' => 'form-control mb-3',
                ],
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '10240k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader un fichier image valide de moins de 10 mo (JPEG, PNG, PDF).',
                    ])
                ],
            ])
            ->add('subject', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Indiquez un sujet...'
                ],
                'label' => 'Sujet',
                'required' => true,
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Votre demande...',
                    'rows' => 5,
                ],
                'label' => 'Message',
                'required' => true,
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
