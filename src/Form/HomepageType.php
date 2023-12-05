<?php

namespace App\Form;

use App\Entity\Homepage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class HomepageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hero1', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le titre 1 (3 ou 4 mots)'
                ],
                'label' => 'Titre 1 (grand) partie 1'
            ])
            ->add('hero1Part2', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le titre 1 (3 ou 4 mots)'
                ],
                'label' => 'Titre 1 (grand) partie 2'
            ])
            ->add('hero2', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le titre 2 (moins de 10 mots)'
                ],
                'label' => 'Titre 2 (petit)'
            ])
            ->add('mainImage', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer l\'URL de l\'image d\'accueil'
                ],
                'label' => 'URL de l\'image'
            ])
            ->add('titleSection2Small', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le petit titre de la section 2'
                ],
                'label' => 'Titre 2 (petit)*'
            ])
            ->add('titleSection2Big', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le grand titre de la section 2'
                ],
                'label' => 'Titre 2 (grand)'
            ])
            ->add('promise1', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le titre de la promesse 1'
                ],
                'label' => 'Promesse 1'
            ])
            ->add('promise2', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le titre de la promesse 2'
                ],
                'label' => 'Promesse 2'
            ])
            ->add('promise3', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le titre de la promesse 3'
                ],
                'label' => 'Promesse 3'
            ])
            ->add('promise4', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le titre de la promesse 4'
                ],
                'label' => 'Promesse 4'
            ])
            ->add('promise1Image', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer l\'URL de la photo de la promesse 1'
                ],
                'label' => 'URL image promesse 1'
            ])
            ->add('promise2Image', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer l\'URL de la photo de la promesse 2'
                ],
                'label' => 'URL image promesse 2'
            ])
            ->add('promise3Image', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer l\'URL de la photo de la promesse 2'
                ],
                'label' => 'URL image promesse 2'
            ])
            ->add('promise4Image', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer l\'URL de la photo de la promesse 4'
                ],
                'label' => 'URL image promesse 4'
            ])
            ->add('titleSection3', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le titre de la section 3'
                ],
                'label' => 'Titre 3**'
            ])
            ->add('aboutText1', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'editor-home-1',
                    'rows' => 5,
                ],
                'label' => 'Ecrire section "à propos" 1',
            ])
            ->add('aboutText2', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'editor-home-2',
                    'rows' => 5,
                ],
                'label' => 'Ecrire section "à propos" 2',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Homepage::class,
        ]);
    }
}
