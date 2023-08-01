<?php

namespace App\Entity;

use App\Repository\BoxRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoxRepository::class)]
class Box
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $psu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $side_panel = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $external_525_bays = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $internal_35_bays = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getPsu(): ?string
    {
        return $this->psu;
    }

    public function setPsu(?string $psu): static
    {
        $this->psu = $psu;

        return $this;
    }

    public function getSidePanel(): ?string
    {
        return $this->side_panel;
    }

    public function setSidePanel(?string $side_panel): static
    {
        $this->side_panel = $side_panel;

        return $this;
    }

    public function getExternal525Bays(): ?string
    {
        return $this->external_525_bays;
    }

    public function setExternal525Bays(string $external_525_bays): static
    {
        $this->external_525_bays = $external_525_bays;

        return $this;
    }

    public function getInternal35Bays(): ?string
    {
        return $this->internal_35_bays;
    }

    public function setInternal35Bays(string $internal_35_bays): static
    {
        $this->internal_35_bays = $internal_35_bays;

        return $this;
    }
}
