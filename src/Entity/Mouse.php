<?php

namespace App\Entity;

use App\Repository\MouseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
#[ApiResource]
#[ApiFilter(SearchFilter::class, properties: ['name' => 'partial'])]

#[ORM\Entity(repositoryClass: MouseRepository::class)]
class Mouse
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
    private ?string $tracking_method = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $connection_type = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $max_dpi = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hand_orientation = null;

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

    public function getTrackingMethod(): ?string
    {
        return $this->tracking_method;
    }

    public function setTrackingMethod(string $tracking_method): static
    {
        $this->tracking_method = $tracking_method;

        return $this;
    }

    public function getConnectionType(): ?string
    {
        return $this->connection_type;
    }

    public function setConnectionType(?string $connection_type): static
    {
        $this->connection_type = $connection_type;

        return $this;
    }

    public function getMaxDpi(): ?string
    {
        return $this->max_dpi;
    }

    public function setMaxDpi(?string $max_dpi): static
    {
        $this->max_dpi = $max_dpi;

        return $this;
    }

    public function getHandOrientation(): ?string
    {
        return $this->hand_orientation;
    }

    public function setHandOrientation(?string $hand_orientation): static
    {
        $this->hand_orientation = $hand_orientation;

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