<?php

namespace App\Document;

use App\Model\DataInterface;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document(repositoryClass="App\Repository\ElectricVehiclePopulationDataDocumentRepository") */
class ElectricVehiclePopulationDataDocument implements DataInterface
{
    /** @ODM\Id */
    private string $id;

    /** @ODM\Field(type="string") */
    private string $vin;

    /** @ODM\Field(type="string") */
    private string $county;

    /** @ODM\Field(type="string") */
    private string $city;

    /** @ODM\Field(type="string") */
    private string $state;

    /** @ODM\Field(type="int") */
    private int $postalCode;

    /** @ODM\Field(type="int") */
    private int $modelYear;

    /** @ODM\Field(type="string") */
    private string $make;

    /** @ODM\Field(type="string") */
    private string $model;

    /** @ODM\Field(type="string") */
    private string $electricVehicleType;

    /** @ODM\Field(type="string") */
    private string $cleanAlternativeFuelVehicleEligibility;

    /** @ODM\Field(type="int") */
    private int $electricRange;

    /** @ODM\Field(type="int") */
    private string $baseMSRP;

    /** @ODM\Field(type="string", nullable=true) */
    private ?string $legislativeDistrict = null;

    /** @ODM\Field(type="int") */
    private int $dolVehicleID;

    /** @ODM\Field(type="string") */
    private string $vehicleLocation;

    /** @ODM\Field(type="string", nullable=true) */
    private string $electricUtility;

    /** @ODM\Field(type="string") */
    private int $censusTract;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
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

    public function getBaseMSRP(): string
    {
        return $this->baseMSRP;
    }

    public function setBaseMSRP(string $baseMSRP): self
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

    public function getElectricUtility(): string
    {
        return $this->electricUtility;
    }

    public function setElectricUtility(string $electricUtility): self
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
