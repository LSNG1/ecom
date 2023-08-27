<?php

namespace App\Entity;

use App\Repository\GpuRepository;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
#[ApiFilter(SearchFilter::class, properties: ['name' => 'partial'])]

#[ORM\Entity(repositoryClass: GpuRepository::class)]
class Gpu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1024)]
    private ?string $name = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?float $price = null;

	#[ORM\Column(type: 'string', length: 255, nullable: true)]
	private ?string $status;

	#[ORM\Column(type: Types::INTEGER, nullable: true)]  
	private ?int $stock = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $chipset = null;

    #[ORM\Column(nullable: true)]
    private ?float $memory = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $core_clock = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $boost_clock = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $length = null;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getChipset(): ?string
    {
        return $this->chipset;
    }

    public function setChipset(?string $chipset): static
    {
        $this->chipset = $chipset;

        return $this;
    }

    public function getMemory(): ?float
    {
        return $this->memory;
    }

    public function setMemory(?float $memory): static
    {
        $this->memory = $memory;

        return $this;
    }

    public function getCoreClock(): ?string
    {
        return $this->core_clock;
    }

    public function setCoreClock(?string $core_clock): static
    {
        $this->core_clock = $core_clock;

        return $this;
    }

    public function getBoost_Clock(): ?string
    {
        return $this->boost_clock;
    }

    public function setBoost�Clock(?string $boost_clock): static
    {
        $this->boost_clock = $boost_clock;

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

    public function getLength(): ?string
    {
        return $this->length;
    }

    public function setLength(?string $length): static
    {
        $this->length = $length;

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