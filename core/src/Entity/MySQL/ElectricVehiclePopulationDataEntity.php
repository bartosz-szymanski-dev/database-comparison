<?php

namespace App\Entity\MySQL;

use App\Repository\ElectricVehiclePopulationDataEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElectricVehiclePopulationDataEntityRepository::class)]
class ElectricVehiclePopulationDataEntity
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
