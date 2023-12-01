<?php

namespace App\Entity;

use App\Repository\HomepageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HomepageRepository::class)]
class Homepage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $hero1 = null;

    #[ORM\Column(length: 255)]
    private ?string $hero2 = null;

    #[ORM\Column(length: 255)]
    private ?string $mainImage = null;

    #[ORM\Column(length: 255)]
    private ?string $collectionImage1 = null;

    #[ORM\Column(length: 255)]
    private ?string $collectionText1 = null;

    #[ORM\Column(length: 255)]
    private ?string $collectionImage2 = null;

    #[ORM\Column(length: 255)]
    private ?string $collectionText2 = null;

    #[ORM\Column(length: 255)]
    private ?string $collectionImage3 = null;

    #[ORM\Column(length: 255)]
    private ?string $collectionText3 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $aboutText = null;

    #[ORM\Column(length: 255)]
    private ?string $aboutVideo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHero1(): ?string
    {
        return $this->hero1;
    }

    public function setHero1(string $hero1): static
    {
        $this->hero1 = $hero1;

        return $this;
    }

    public function getHero2(): ?string
    {
        return $this->hero2;
    }

    public function setHero2(string $hero2): static
    {
        $this->hero2 = $hero2;

        return $this;
    }

    public function getMainImage(): ?string
    {
        return $this->mainImage;
    }

    public function setMainImage(string $mainImage): static
    {
        $this->mainImage = $mainImage;

        return $this;
    }

    public function getCollectionImage1(): ?string
    {
        return $this->collectionImage1;
    }

    public function setCollectionImage1(string $collectionImage1): static
    {
        $this->collectionImage1 = $collectionImage1;

        return $this;
    }

    public function getCollectionText1(): ?string
    {
        return $this->collectionText1;
    }

    public function setCollectionText1(string $collectionText1): static
    {
        $this->collectionText1 = $collectionText1;

        return $this;
    }

    public function getCollectionImage2(): ?string
    {
        return $this->collectionImage2;
    }

    public function setCollectionImage2(string $collectionImage2): static
    {
        $this->collectionImage2 = $collectionImage2;

        return $this;
    }

    public function getCollectionText2(): ?string
    {
        return $this->collectionText2;
    }

    public function setCollectionText2(string $collectionText2): static
    {
        $this->collectionText2 = $collectionText2;

        return $this;
    }

    public function getCollectionImage3(): ?string
    {
        return $this->collectionImage3;
    }

    public function setCollectionImage3(string $collectionImage3): static
    {
        $this->collectionImage3 = $collectionImage3;

        return $this;
    }

    public function getCollectionText3(): ?string
    {
        return $this->collectionText3;
    }

    public function setCollectionText3(string $collectionText3): static
    {
        $this->collectionText3 = $collectionText3;

        return $this;
    }

    public function getAboutText(): ?string
    {
        return $this->aboutText;
    }

    public function setAboutText(string $aboutText): static
    {
        $this->aboutText = $aboutText;

        return $this;
    }

    public function getAboutVideo(): ?string
    {
        return $this->aboutVideo;
    }

    public function setAboutVideo(string $aboutVideo): static
    {
        $this->aboutVideo = $aboutVideo;

        return $this;
    }
}
