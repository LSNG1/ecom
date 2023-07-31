<?php

namespace App\Entity;

use App\Repository\HardDriveRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HardDriveRepository::class)]
class HardDrive
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\Column]
    private ?int $capacity = null;

    #[ORM\Column(nullable: true)]
    private ?int $price_per_gb = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $cache = null;

    #[ORM\Column(length: 255)]
    private ?string $form_factor = null;

    #[ORM\Column(length: 255)]
    private ?string $interface = null;

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

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getPricePerGb(): ?int
    {
        return $this->price_per_gb;
    }

    public function setPricePerGb(?int $price_per_gb): static
    {
        $this->price_per_gb = $price_per_gb;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getCache(): ?string
    {
        return $this->cache;
    }

    public function setCache(?string $cache): static
    {
        $this->cache = $cache;

        return $this;
    }

    public function getFormFactor(): ?string
    {
        return $this->form_factor;
    }

    public function setFormFactor(string $form_factor): static
    {
        $this->form_factor = $form_factor;

        return $this;
    }

    public function getInterface(): ?string
    {
        return $this->interface;
    }

    public function setInterface(string $interface): static
    {
        $this->interface = $interface;

        return $this;
    }
}
