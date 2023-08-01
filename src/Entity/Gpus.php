<?php

namespace App\Entity;

use App\Repository\GpusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GpusRepository::class)]
class Gpus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
