<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CpuCoolerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;


#[ApiResource]
#[ORM\Entity(repositoryClass: CpuCoolerRepository::class)]
#[ApiFilter(SearchFilter::class, properties: ['name' => 'partial'])]
class CpuCooler
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

	#[ORM\Column(type: 'string', length: 255, nullable: true)]
	private ?string $status;

	#[ORM\Column(type: Types::INTEGER, nullable: true)]  
	private ?int $stock = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rpm = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $noise_level = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $size = null;

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

    public function getRpm(): ?string
    {
        return $this->rpm;
    }

    public function setRpm(?string $rpm): static
    {
        $this->rpm = $rpm;

        return $this;
    }

    public function getNoiseLevel(): ?string
    {
        return $this->noise_level;
    }

    public function setNoiseLevel(?string $noise_level): static
    {
        $this->noise_level = $noise_level;

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

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): static
    {
        $this->size = $size;

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