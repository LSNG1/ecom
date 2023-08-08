<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;

use App\Repository\CpuRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;

#[ApiResource]
#[ApiFilter(SearchFilter::class, properties: ['name' => 'partial'])]

#[ORM\Entity(repositoryClass: CpuRepository::class)]
class Cpu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $coreCount = null;

    #[ORM\Column]
    private ?int $coreClock = null;

    #[ORM\Column]
    private ?int $boostClock = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $tdp = null;

    #[ORM\Column]
    private ?int $graphics = null;

    #[ORM\Column]
    private ?bool $smt = null;

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

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getCoreCount(): ?string
    {
        return $this->coreCount;
    }

    public function setCoreCount(string $coreCount): static
    {
        $this->coreCount = $coreCount;

        return $this;
    }

    public function getCoreClock(): ?int
    {
        return $this->coreClock;
    }

    public function setCoreClock(int $coreClock): static
    {
        $this->coreClock = $coreClock;

        return $this;
    }

    public function getBoostClock(): ?int
    {
        return $this->boostClock;
    }

    public function setBoostClock(int $boostClock): static
    {
        $this->boostClock = $boostClock;

        return $this;
    }

    public function getTdp(): ?string
    {
        return $this->tdp;
    }

    public function setTdp(string $tdp): static
    {
        $this->tdp = $tdp;

        return $this;
    }

    public function getGraphics(): ?int
    {
        return $this->graphics;
    }

    public function setGraphics(int $graphics): static
    {
        $this->graphics = $graphics;

        return $this;
    }

    public function isSmt(): ?bool
    {
        return $this->smt;
    }

    public function setSmt(bool $smt): static
    {
        $this->smt = $smt;

        return $this;
    }
}
