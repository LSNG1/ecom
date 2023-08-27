<?php

namespace App\Entity;

use App\Repository\PowerSupplyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
#[ApiResource]
#[ORM\Entity(repositoryClass: PowerSupplyRepository::class)]
#[ApiFilter(SearchFilter::class, properties: ['name' => 'partial'])]
class PowerSupply
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

	#[ORM\Column(type: 'string', length: 255, nullable: true)]
	private ?string $status;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

	#[ORM\Column(type: Types::INTEGER, nullable: true)]
	private ?int $stock = null;


    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $efficiency = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $wattage = null;

    #[ORM\Column(length: 255)]
    private ?string $modular = null;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getEfficiency(): ?string
    {
        return $this->efficiency;
    }

    public function setEfficency(?string $efficiency): static
    {
        $this->efficiency = $efficiency;

        return $this;
    }

    public function getWattage(): ?string
    {
        return $this->wattage;
    }

    public function setWattage(string $wattage): static
    {
        $this->wattage = $wattage;

        return $this;
    }

    public function getModular(): ?string
    {
        return $this->modular;
    }

    public function setModular(string $modular): static
    {
        $this->modular = $modular;

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
}