<?php

namespace App\Entity;

use App\Repository\NavbarContentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NavbarContentRepository::class)]
class NavbarContent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $menu1 = null;

    #[ORM\Column(length: 100)]
    private ?string $menu1Url = null;

    #[ORM\Column(length: 100)]
    private ?string $menu2 = null;

    #[ORM\Column(length: 100)]
    private ?string $menu2Url = null;

    #[ORM\Column(length: 100)]
    private ?string $menu3 = null;
    #[ORM\Column(length: 100)]
    private ?string $menu3Url = null;

    #[ORM\Column(length: 100)]
    private ?string $menu4 = null;
    #[ORM\Column(length: 100)]
    private ?string $menu4Url = null;

    #[ORM\Column(length: 100)]
    private ?string $logoImage = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $phoneNumberTitle1 = null;

    #[ORM\Column(length: 10)]
    private ?string $phoneNumber1 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $phoneNumberTitle2 = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $phoneNumber2 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $phoneNumberTitle3 = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $phoneNumber3 = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 100)]
    private ?string $adressTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adress2 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $adressTitle2 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $openingHours = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $facebook = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $signature = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMenu1(): ?string
    {
        return $this->menu1;
    }

    public function setMenu1(string $menu1): static
    {
        $this->menu1 = $menu1;

        return $this;
    }

    public function getMenu1Url(): ?string
    {
        return $this->menu1Url;
    }

    public function setMenu1Url(string $menu1Url): static
    {
        $this->menu1Url = $menu1Url;

        return $this;
    }

    public function getMenu2(): ?string
    {
        return $this->menu2;
    }

    public function setMenu2(string $menu2): static
    {
        $this->menu2 = $menu2;

        return $this;
    }

    public function getMenu2Url(): ?string
    {
        return $this->menu2Url;
    }

    public function setMenu2Url(string $menu2Url): static
    {
        $this->menu2Url = $menu2Url;

        return $this;
    }

    public function getMenu3(): ?string
    {
        return $this->menu3;
    }

    public function setMenu3(string $menu3): static
    {
        $this->menu3 = $menu3;

        return $this;
    }

    public function getMenu3Url(): ?string
    {
        return $this->menu3Url;
    }

    public function setMenu3Url(string $menu3Url): static
    {
        $this->menu3Url = $menu3Url;

        return $this;
    }

    public function getMenu4(): ?string
    {
        return $this->menu4;
    }

    public function setMenu4(string $menu4): static
    {
        $this->menu4 = $menu4;

        return $this;
    }

    public function getMenu4Url(): ?string
    {
        return $this->menu4Url;
    }

    public function setMenu4Url(string $menu4Url): static
    {
        $this->menu4Url = $menu4Url;

        return $this;
    }

    public function getLogoImage(): ?string
    {
        return $this->logoImage;
    }

    public function setLogoImage(string $logoImage): static
    {
        $this->logoImage = $logoImage;

        return $this;
    }

    public function getPhoneNumberTitle1(): ?string
    {
        return $this->phoneNumberTitle1;
    }

    public function setPhotoNumberTitle1(string $phoneNumberTitle1): static
    {
        $this->phoneNumberTitle1 = $phoneNumberTitle1;

        return $this;
    }

    public function getPhoneNumber1(): ?string
    {
        return $this->phoneNumber1;
    }

    public function setPhoneNumber1(string $phoneNumber1): static
    {
        $this->phoneNumber1 = $phoneNumber1;

        return $this;
    }

    public function getPhoneNumberTitle2(): ?string
    {
        return $this->phoneNumberTitle2;
    }

    public function setPhotoNumberTitle2(string $phoneNumberTitle2): static
    {
        $this->phoneNumberTitle2 = $phoneNumberTitle2;

        return $this;
    }

    public function getPhoneNumber2(): ?string
    {
        return $this->phoneNumber2;
    }

    public function setPhoneNumber2(string $phoneNumber2): static
    {
        $this->phoneNumber2 = $phoneNumber2;

        return $this;
    }

    public function getPhoneNumberTitle3(): ?string
    {
        return $this->phoneNumberTitle3;
    }

    public function setPhotoNumberTitle3(string $phoneNumberTitle3): static
    {
        $this->phoneNumberTitle3 = $phoneNumberTitle3;

        return $this;
    }
    public function getPhoneNumber3(): ?string
    {
        return $this->phoneNumber3;
    }

    public function setPhoneNumber3(string $phoneNumber3): static
    {
        $this->phoneNumber3 = $phoneNumber3;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getAdressTitle(): ?string
    {
        return $this->adressTitle;
    }

    public function setAdressTitle(string $adressTitle): static
    {
        $this->adressTitle = $adressTitle;

        return $this;
    }

    public function getAdress2(): ?string
    {
        return $this->adress2;
    }

    public function setAdress2(?string $adress2): static
    {
        $this->adress2 = $adress2;

        return $this;
    }

    public function getAdressTitle2(): ?string
    {
        return $this->adressTitle2;
    }

    public function setAdressTitle2(?string $adressTitle2): static
    {
        $this->adressTitle2 = $adressTitle2;

        return $this;
    }

    public function getOpeningHours(): ?string
    {
        return $this->openingHours;
    }

    public function setOpeningHours(string $openingHours): static
    {
        $this->openingHours = $openingHours;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): static
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function setSignature(?string $signature): static
    {
        $this->signature = $signature;

        return $this;
    }
}
