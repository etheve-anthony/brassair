<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[Vich\Uploadable]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $caracteristique_1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $caracteristique_2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $caracteristique_3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $caracteristique_4 = null;

    #[ORM\Column(length: 200)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping: 'pdfs', fileNameProperty: 'pdfName', size: 'pdfSize')]
    private ?File $pdfFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pdfName = null;

    #[ORM\Column(nullable: true)]
    private ?int $pdfSize = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

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

    public function getCaracteristique1(): ?string
    {
        return $this->caracteristique_1;
    }

    public function setCaracteristique1(?string $caracteristique_1): static
    {
        $this->caracteristique_1 = $caracteristique_1;

        return $this;
    }

    public function getCaracteristique2(): ?string
    {
        return $this->caracteristique_2;
    }

    public function setCaracteristique2(?string $caracteristique_2): static
    {
        $this->caracteristique_2 = $caracteristique_2;

        return $this;
    }

    public function getCaracteristique3(): ?string
    {
        return $this->caracteristique_3;
    }

    public function setCaracteristique3(?string $caracteristique_3): static
    {
        $this->caracteristique_3 = $caracteristique_3;

        return $this;
    }

    public function getCaracteristique4(): ?string
    {
        return $this->caracteristique_4;
    }

    public function setCaracteristique4(?string $caracteristique_4): static
    {
        $this->caracteristique_4 = $caracteristique_4;

        return $this;
    }

    public function setPdfFile(?File $pdfFile = null): void
    {
        $this->pdfFile = $pdfFile;

        if (null !== $pdfFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getPdfFile(): ?File
    {
        return $this->pdfFile;
    }

    public function getPdfName(): ?string
    {
        return $this->pdfName;
    }

    public function setPdfName(?string $pdfName): self
    {
        $this->pdfName = $pdfName;

        return $this;
    }

    public function getPdfSize(): ?int
    {
        return $this->pdfSize;
    }

    public function setPdfSize(?int $pdfSize): self
    {
        $this->pdfSize = $pdfSize;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
