<?php

namespace App\Entity;

use App\Repository\ProductOfferRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductOfferRepository::class)]
class ProductOffer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $image1 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $image2 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $image3 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(?string $image1): static
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): static
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): static
    {
        $this->image3 = $image3;

        return $this;
    }
}
