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
                    'placeholder' => 'Entrer le titre 1'
                ],
                'label' => 'Titre 1'
            ])
            ->add('hero2', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le titre 2'
                ],
                'label' => 'Titre 2'
            ])
            ->add('mainImage', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer l\URL de l\image d\accueil'
                ],
                'label' => 'URL de l\image'
            ])
            ->add('aboutText1', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'editor-home-1',
                    'rows' => 10,
                ],
                'label' => 'Ecrire section "à propos" 1',
            ])
            ->add('aboutText2', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'editor-home-2',
                    'rows' => 10,
                ],
                'label' => 'Ecrire section "à propos" 2',
            ])
            ->add('aboutVideo', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrer le lien url de la video'
                ],
                'label' => 'url de la vidéo'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Homepage::class,
        ]);
    }
}
