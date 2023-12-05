<?php

namespace App\Form;

use App\Entity\ContactInfos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Validator\Constraints as Assert;

class ContactInfosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('telephone', TelType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Renseigner le numéro de téléphone'
                ],
                'label' => 'Numéro de téléphone de l\'entreprise',
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
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'E-mail'
            ])
            ->add('address', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer l\'adresse postale de l\'entreprise'
                ],
                'label' => 'Adresse postale'
            ])
            ->add('openingHours', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'rows' => 5,
                ],
                'label' => 'Décrire les horaires d\'ouverture',
            ])
            ->add('facebookPage', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer l\'URL de la page Facebook de l\'entreprise'
                ],
                'label' => 'URL de la page Facebook'
            ])
            ->add('logoImage', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer l\'URL du logo de l\'entreprise'
                ],
                'label' => 'URL du logo importé sur le site*'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactInfos::class,
        ]);
    }
}
