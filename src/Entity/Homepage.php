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

    #[ORM\Column(length: 100)]
    private ?string $buttonText = null;

    #[ORM\Column(length: 100)]
    private ?string $titleSection2Small = null;

    #[ORM\Column(length: 100)]
    private ?string $titleSection2Big = null;

    #[ORM\Column(length: 100)]
    private ?string $promise1 = null;

    #[ORM\Column(length: 100)]
    private ?string $promise2 = null;

    #[ORM\Column(length: 100)]
    private ?string $promise3 = null;

    #[ORM\Column(length: 100)]
    private ?string $promise4 = null;

    #[ORM\Column(length: 100)]
    private ?string $promise1Image = null;

    #[ORM\Column(length: 100)]
    private ?string $promise2Image = null;

    #[ORM\Column(length: 100)]
    private ?string $promise3Image = null;

    #[ORM\Column(length: 100)]
    private ?string $promise4Image = null;

    #[ORM\Column(length: 100)]
    private ?string $titleSection3 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $aboutText1 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $aboutText2 = null;

    // #[ORM\Column(length: 255)]
    // private ?string $aboutVideo = null;

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

    public function getButtonText(): ?string
    {
        return $this->buttonText;
    }

    public function setButtonText(string $buttonText): static
    {
        $this->buttonText = $buttonText;

        return $this;
    }

    public function getTitleSection2Small(): ?string
    {
        return $this->titleSection2Small;
    }

    public function setTitleSection2Small(string $titleSection2Small): static
    {
        $this->titleSection2Small = $titleSection2Small;

        return $this;
    }

    public function getTitleSection2Big(): ?string
    {
        return $this->titleSection2Big;
    }

    public function setTitleSection2Big(string $titleSection2Big): static
    {
        $this->titleSection2Big = $titleSection2Big;

        return $this;
    }

    public function getPromise1(): ?string
    {
        return $this->promise1;
    }

    public function setPromise1(string $promise1): static
    {
        $this->promise1 = $promise1;

        return $this;
    }

    public function getPromise2(): ?string
    {
        return $this->promise2;
    }

    public function setPromise2(string $promise2): static
    {
        $this->promise2 = $promise2;

        return $this;
    }

    public function getPromise3(): ?string
    {
        return $this->promise3;
    }

    public function setPromise3(string $promise3): static
    {
        $this->promise3 = $promise3;

        return $this;
    }

    public function getPromise4(): ?string
    {
        return $this->promise4;
    }

    public function setPromise4(string $promise4): static
    {
        $this->promise4 = $promise4;

        return $this;
    }

    public function getPromise1Image(): ?string
    {
        return $this->promise1Image;
    }

    public function setPromise1Image(string $promise1Image): static
    {
        $this->promise1Image = $promise1Image;

        return $this;
    }

    public function getPromise2Image(): ?string
    {
        return $this->promise2Image;
    }

    public function setPromise2Image(string $promise2Image): static
    {
        $this->promise2Image = $promise2Image;

        return $this;
    }

    public function getPromise3Image(): ?string
    {
        return $this->promise3Image;
    }

    public function setPromise3Image(string $promise3Image): static
    {
        $this->promise3 = $promise3Image;

        return $this;
    }

    public function getPromise4Image(): ?string
    {
        return $this->promise4Image;
    }

    public function setPromise4Image(string $promise4Image): static
    {
        $this->promise4Image = $promise4Image;

        return $this;
    }

    public function getAboutText1(): ?string
    {
        return $this->aboutText1;
    }

    public function setAboutText1(string $aboutText1): static
    {
        $this->aboutText1 = $aboutText1;

        return $this;
    }

    public function getAboutText2(): ?string
    {
        return $this->aboutText2;
    }

    public function setAboutText2(string $aboutText2): static
    {
        $this->aboutText2 = $aboutText2;

        return $this;
    }

    // public function getAboutVideo(): ?string
    // {
    //     return $this->aboutVideo;
    // }

    // public function setAboutVideo(string $aboutVideo): static
    // {
    //     $this->aboutVideo = $aboutVideo;

    //     return $this;
    // }
}
