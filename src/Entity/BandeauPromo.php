<?php

namespace App\Entity;

use App\Repository\BandeauPromoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BandeauPromoRepository::class)]
class BandeauPromo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $promoText1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $promoText2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $promoText3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $promoText4 = null;

    #[ORM\Column(length: 7, nullable: true)]
    private ?string $backgroundColor = null;

    #[ORM\Column(length: 7, nullable: true)]
    private ?string $textColor = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $link = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $linkText = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPromoText1(): ?string
    {
        return $this->promoText1;
    }

    public function setPromoText1(?string $promoText1): static
    {
        $this->promoText1 = $promoText1;

        return $this;
    }

    public function getPromoText2(): ?string
    {
        return $this->promoText2;
    }

    public function setPromoText2(?string $promoText2): static
    {
        $this->promoText2 = $promoText2;

        return $this;
    }

    public function getPromoText3(): ?string
    {
        return $this->promoText3;
    }

    public function setPromoText3(?string $promoText3): static
    {
        $this->promoText3 = $promoText3;

        return $this;
    }

    public function getPromoText4(): ?string
    {
        return $this->promoText4;
    }

    public function setPromoText4(?string $promoText4): static
    {
        $this->promoText4 = $promoText4;

        return $this;
    }

    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor(?string $backgroundColor): static
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    public function getTextColor(): ?string
    {
        return $this->textColor;
    }

    public function setTextColor(?string $textColor): static
    {
        $this->textColor = $textColor;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function getLinkText(): ?string
    {
        return $this->linkText;
    }

    public function setLinkText(?string $linkText): static
    {
        $this->linkText = $linkText;

        return $this;
    }
}
