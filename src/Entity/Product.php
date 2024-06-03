<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_bg = null;

    #[ORM\Column(length: 255)]
    private ?string $name_en = null;

    #[ORM\Column(type:  Types::TEXT, nullable: true)]
    private ?string $description_en = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description_bg = null;

    #[ORM\Column(length: 100)]
    private ?string $color_en = null;

    #[ORM\Column(length: 100)]
    private ?string $color_bg = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $price = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $created_by = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $updated_by = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameBg(): ?string
    {
        return $this->name_bg;
    }

    public function setNameBg(string $name_bg): static
    {
        $this->name_bg = $name_bg;

        return $this;
    }

    public function getNameEn(): ?string
    {
        return $this->name_en;
    }

    public function setNameEn(string $name_en): static
    {
        $this->name_en = $name_en;

        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->description_en;
    }

    public function setDescriptionEn(?string $description_en): static
    {
        $this->description_en = $description_en;

        return $this;
    }

    public function getDescriptionBg(): ?string
    {
        return $this->description_bg;
    }

    public function setDescriptionBg(?string $description_bg): static
    {
        $this->description_bg = $description_bg;

        return $this;
    }

    public function getColorEn(): ?string
    {
        return $this->color_en;
    }

    public function setColorEn(string $color_en): static
    {
        $this->color_en = $color_en;

        return $this;
    }

    public function getColorBg(): ?string
    {
        return $this->color_bg;
    }

    public function setColorBg(string $color_bg): static
    {
        $this->color_bg = $color_bg;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->created_by;
    }

    public function setCreatedBy(string $created_by): static
    {
        $this->created_by = $created_by;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updated_by;
    }

    public function setUpdatedBy(string $updated_by): static
    {
        $this->updated_by = $updated_by;

        return $this;
    }
}
