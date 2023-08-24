<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;

use App\Repository\CpuRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]

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

	#[ORM\Column(type: 'string', length: 255, nullable: true)]
	private ?string $status;

	#[ORM\Column(type: Types::INTEGER, nullable: true)]  
	private ?int $stock = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $coreCount = null;

    #[ORM\Column]
    private ?int $coreClock = null;

    #[ORM\Column]
    private ?int $boostClock = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $tdp = null;

    #[ORM\Column]
    private ?string $graphics = null;

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

    public function getGraphics(): ?string
    {
        return $this->graphics;
    }

    public function setGraphics(string $graphics): static
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

	public function getStock(): ?int
	{
		return $this->stock;
	}

	public function setStock(?int $stock): static
	{
		$this->stock = $stock;

		return $this;
	}

	public function getStatus(): ?string
	{
		return $this->status;
	}

	public function setStatus(?string $status): static
	{
		$this->status = $status;

		return $this;
	}
}