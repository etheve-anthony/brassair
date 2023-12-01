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
