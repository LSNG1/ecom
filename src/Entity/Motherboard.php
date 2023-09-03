<?php

namespace App\Entity;

use App\Repository\MotherboardRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
#[ApiResource]
#[ApiFilter(SearchFilter::class, properties: ['name' => 'partial'])]

#[ORM\Entity(repositoryClass: MotherboardRepository::class)]
class Motherboard
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

	#[ORM\Column(type: Types::FLOAT, nullable: true)]
    private ?float $reductionAmount = null;

	#[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?float $shipmentFee = null;

	#[ORM\Column(type: 'string', length: 255, nullable: true)]
	private ?string $status;

	#[ORM\Column(type: Types::INTEGER, nullable: true)]
	private ?int $stock = null;

    #[ORM\Column(length: 255)]
    private ?string $socket = null;

    #[ORM\Column(length: 255)]
    private ?string $form_factor = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $max_memory = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $memory_slots = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;

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

    public function getSocket(): ?string
    {
        return $this->socket;
    }

    public function setSocket(string $socket): static
    {
        $this->socket = $socket;

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

    public function getMaxMemory(): ?string
    {
        return $this->max_memory;
    }

    public function setMaxMemory(string $max_memory): static
    {
        $this->max_memory = $max_memory;

        return $this;
    }

    public function getMemorySlots(): ?string
    {
        return $this->memory_slots;
    }

    public function setMemorySlots(string $memory_slots): static
    {
        $this->memory_slots = $memory_slots;

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

	public function getShipmentFee(): ?float
	{
		return $this->shipmentFee;
	}

	public function setShipmentFee(?float $shipmentFee): static
	{
		$this->shipmentFee = $shipmentFee;

		return $this;
	}

	public function getReductionAmount(): ?float
	{
		return $this->reductionAmount;
	}

	public function setReductionAmount(?float $reductionAmount): static
	{
		$this->reductionAmount = $reductionAmount;

		return $this;
	}
	
	
}