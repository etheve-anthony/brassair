<?php

namespace App\Entity;

use App\Repository\ContactInfosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactInfosRepository::class)]
class ContactInfos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $telephone = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $openingHours = null;

    #[ORM\Column(length: 100)]
    private ?string $facebookPage = null;

    #[ORM\Column(length: 150)]
    private ?string $logoImage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

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

    public function getFacebookPage(): ?string
    {
        return $this->facebookPage;
    }

    public function setFacebookPage(string $facebookPage): static
    {
        $this->facebookPage = $facebookPage;

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
}
