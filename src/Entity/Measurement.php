<?php

namespace App\Entity;

use App\Repository\MeasurementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeasurementRepository::class)]
class Measurement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'measurements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $Date = null;

    #[ORM\Column]
    private ?int $Temperature = null;

    #[ORM\Column]
    private ?int $Percipation = null;

    #[ORM\Column]
    private ?int $Pressure = null;

    #[ORM\Column]
    private ?int $Cloudiness = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->Date;
    }

    public function setDate(\DateTime $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getTemperature(): ?int
    {
        return $this->Temperature;
    }

    public function setTemperature(int $Temperature): static
    {
        $this->Temperature = $Temperature;

        return $this;
    }

    public function getPercipation(): ?int
    {
        return $this->Percipation;
    }

    public function setPercipation(int $Percipation): static
    {
        $this->Percipation = $Percipation;

        return $this;
    }

    public function getPressure(): ?int
    {
        return $this->Pressure;
    }

    public function setPressure(int $Pressure): static
    {
        $this->Pressure = $Pressure;

        return $this;
    }

    public function getCloudiness(): ?int
    {
        return $this->Cloudiness;
    }

    public function setCloudiness(int $Cloudiness): static
    {
        $this->Cloudiness = $Cloudiness;

        return $this;
    }
}
