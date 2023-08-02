<?php

namespace App\Entity;

use App\Repository\MemoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemoryRepository::class)]
class Memory
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
    private ?string $speed = null;

    #[ORM\Column]
    private string $modules = "null";

    #[ORM\Column(nullable: true)]
    private ?int $price_per_gb = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;

    #[ORM\Column]
    private ?int $first_word_latency = null;

    #[ORM\Column]
    private ?int $cas_latency = null;

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

    public function getSpeed(): ?string
    {
        return $this->speed;
    }

    public function setSpeed(string $speed): static
    {
        $this->speed = $speed;

        return $this;
    }

    public function getModules(): string
    {
        return $this->modules;
    }

    public function setModules(string $modules): static
    {
        $this->modules = $modules;

        return $this;
    }

    public function getPricePerGb(): ?int
    {
        return $this->price_per_gb;
    }

    public function setPricePerBg(?int $price_per_gb): static
    {
        $this->price_per_gb = $price_per_gb;

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

    public function getFirstWordLatency(): ?int
    {
        return $this->first_word_latency;
    }

    public function setFirstWordLatency(int $first_word_latency): static
    {
        $this->first_word_latency = $first_word_latency;

        return $this;
    }

    public function getCasLatency(): ?int
    {
        return $this->cas_latency;
    }

    public function setCasLatency(int $cas_latency): static
    {
        $this->cas_latency = $cas_latency;

        return $this;
    }
}
