<?php

namespace App\Entity;

use App\Repository\HeadphonesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
#[ApiResource]
#[ApiFilter(SearchFilter::class, properties: ['name' => 'partial'])]

#[ORM\Entity(repositoryClass: HeadphonesRepository::class)]
class Headphones
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
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?array $frequency_response = null;

    #[ORM\Column]
    private ?bool $microphone = null;

    #[ORM\Column]
    private ?bool $wireless = null;

    #[ORM\Column(length: 255)]
    private ?string $enclosure_type = null;

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

    public function getFrequencyResponse(): ?array
    {
        return $this->frequency_response;
    }

    public function setFrequencyResponse(?array $frequency_response): static
    {
        $this->frequency_response = $frequency_response;

        return $this;
    }

    public function isMicrophone(): ?bool
    {
        return $this->microphone;
    }

    public function setMicrophone(bool $microphone): static
    {
        $this->microphone = $microphone;

        return $this;
    }

    public function isWireless(): ?bool
    {
        return $this->wireless;
    }

    public function setWireless(bool $wireless): static
    {
        $this->wireless = $wireless;

        return $this;
    }

    public function getEnclosureType(): ?string
    {
        return $this->enclosure_type;
    }

    public function setEnclosureType(string $enclosure_type): static
    {
        $this->enclosure_type = $enclosure_type;

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