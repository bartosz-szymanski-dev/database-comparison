<?php

namespace App\Entity;

use App\Model\DataInterface;
use App\Repository\ElectricVehiclePopulationDataEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElectricVehiclePopulationDataEntityRepository::class)]
class ElectricVehiclePopulationDataEntity implements DataInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $vin;

    #[ORM\Column(type: 'string', length: 255)]
    private string $county;

    #[ORM\Column(type: 'string', length: 255)]
    private string $city;

    #[ORM\Column(type: 'string', length: 255)]
    private string $state;

    #[ORM\Column(type: 'integer')]
    private int $postalCode;

    #[ORM\Column(type: 'integer')]
    private int $modelYear;

    #[ORM\Column(type: 'string', length: 255)]
    private string $make;

    #[ORM\Column(type: 'string', length: 255)]
    private string $model;

    #[ORM\Column(type: 'string', length: 255)]
    private string $electricVehicleType;

    #[ORM\Column(type: 'string', length: 255)]
    private string $cleanAlternativeFuelVehicleEligibility;

    #[ORM\Column(type: 'integer')]
    private int $electricRange;

    #[ORM\Column(type: 'integer')]
    private int $baseMSRP;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $legislativeDistrict = null;

    #[ORM\Column(type: 'integer')]
    private int $dolVehicleID;

    #[ORM\Column(type: 'string', length: 255)]
    private string $vehicleLocation;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $electricUtility = null;

    #[ORM\Column(type: 'string')]
    private int $censusTract;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVin(): string
    {
        return $this->vin;
    }

    public function setVin(string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getCounty(): string
    {
        return $this->county;
    }

    public function setCounty(string $county): self
    {
        $this->county = $county;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getPostalCode(): int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getModelYear(): int
    {
        return $this->modelYear;
    }

    public function setModelYear(int $modelYear): self
    {
        $this->modelYear = $modelYear;

        return $this;
    }

    public function getMake(): string
    {
        return $this->make;
    }

    public function setMake(string $make): self
    {
        $this->make = $make;

        return $this;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getElectricVehicleType(): string
    {
        return $this->electricVehicleType;
    }

    public function setElectricVehicleType(string $electricVehicleType): self
    {
        $this->electricVehicleType = $electricVehicleType;

        return $this;
    }

    public function getCleanAlternativeFuelVehicleEligibility(): string
    {
        return $this->cleanAlternativeFuelVehicleEligibility;
    }

    public function setCleanAlternativeFuelVehicleEligibility(string $cleanAlternativeFuelVehicleEligibility): self
    {
        $this->cleanAlternativeFuelVehicleEligibility = $cleanAlternativeFuelVehicleEligibility;

        return $this;
    }

    public function getElectricRange(): int
    {
        return $this->electricRange;
    }

    public function setElectricRange(int $electricRange): self
    {
        $this->electricRange = $electricRange;

        return $this;
    }

    public function getBaseMSRP(): int
    {
        return $this->baseMSRP;
    }

    public function setBaseMSRP(int|string $baseMSRP): self
    {
        $this->baseMSRP = $baseMSRP;

        return $this;
    }

    public function getLegislativeDistrict(): ?string
    {
        return $this->legislativeDistrict;
    }

    public function setLegislativeDistrict(?string $legislativeDistrict): self
    {
        $this->legislativeDistrict = $legislativeDistrict;

        return $this;
    }

    public function getDolVehicleID(): int
    {
        return $this->dolVehicleID;
    }

    public function setDolVehicleID(int $dolVehicleID): self
    {
        $this->dolVehicleID = $dolVehicleID;

        return $this;
    }

    public function getVehicleLocation(): string
    {
        return $this->vehicleLocation;
    }

    public function setVehicleLocation(string $vehicleLocation): self
    {
        $this->vehicleLocation = $vehicleLocation;

        return $this;
    }

    public function getElectricUtility(): ?string
    {
        return $this->electricUtility;
    }

    public function setElectricUtility(?string $electricUtility): self
    {
        $this->electricUtility = $electricUtility;

        return $this;
    }

    public function getCensusTract(): int
    {
        return $this->censusTract;
    }

    public function setCensusTract(int $censusTract): self
    {
        $this->censusTract = $censusTract;

        return $this;
    }
}
