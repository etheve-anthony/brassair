<?php

namespace App\Form;

use App\Entity\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrez le titre de l\'application ou autre'
                ],
                'label' => 'Titre de l\'application'
            ])
            ->add('mainImage', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le lien url de l\'image principale'
                ],
                'label' => 'url de l\'image principale'
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'editor',
                    'rows' => 7,
                    'placeholder' => 'Veuillez renseigner des détails sur l\'application'
                ],
                'label' => 'Description du produit',
            ])
            ->add('message1', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrez l\'annonce 1'
                ],
                'label' => 'Annonce 1'
            ])
            ->add('message2', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrez l\'annonce 2'
                ],
                'label' => 'Annonce 2'
            ])
            ->add('message3', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrez l\'annonce 3'
                ],
                'label' => 'Annonce 3'
            ])
            ->add('image1', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le lien url de l\'image 1'
                ],
                'label' => 'url de l\'image 1'
            ])
            ->add('image2', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le lien url de l\'image 2'
                ],
                'label' => 'url de l\'image 2',
                'required' => false
            ])
            ->add('image3', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le lien url de l\'image 3'
                ],
                'label' => 'url de l\'image 3',
                'required' => false
            ])
            ->add('image4', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le lien url de l\'image 4'
                ],
                'label' => 'url de l\'image 4',
                'required' => false
            ])
            ->add('image5', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le lien url de l\'image 5'
                ],
                'label' => 'url de l\'image 5',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Application::class,
        ]);
    }
}
