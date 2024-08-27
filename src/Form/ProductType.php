<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrez le titre du produit'
                ],
                'label' => 'Titre du produit'
            ])
            ->add('caracteristique_1', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrez la caractéristique'
                ],
                'label' => 'Caractéristique 1'
            ])
            ->add('caracteristique_2', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrez la caractéristique'
                ],
                'label' => 'Caractéristique 2'
            ])
            ->add('caracteristique_3', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrez la caractéristique'
                ],
                'label' => 'Caractéristique 3'
            ])
            ->add('caracteristique_4', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Entrez la caractéristique'
                ],
                'label' => 'Caractéristique 4'
            ])
            ->add('pdfFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => false,
                'delete_label' => "Supprimer ce fichier",
                'download_label' => 'Télécharger le fichier PDF',
                'download_uri' => true,
                'asset_helper' => true,
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Fichier PDF à uploader',
                'constraints' => [
                    new File([
                        'maxSize' => '5120k',  // Limite la taille à 5 Mo
                        'mimeTypes' => [
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader un fichier PDF valide.',
                    ])
                ],
            ])
            ->add('image', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-3',
                    'placeholder' => 'Entrer le lien url de l\'image'
                ],
                'label' => 'url de l\'image'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
