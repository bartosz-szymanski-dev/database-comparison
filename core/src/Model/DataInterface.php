<?php

namespace App\Model;

interface DataInterface
{
    public function setVin(string $vin): self;
    public function setCounty(string $county): self;
    public function setCity(string $city): self;
    public function setState(string $state): self;
    public function setPostalCode(int $postalCode): self;
    public function setModelYear(int $modelYear): self;
    public function setMake(string $make): self;
    public function setModel(string $model): self;
    public function setElectricVehicleType(string $electricVehicleType): self;
    public function setCleanAlternativeFuelVehicleEligibility(string $cleanAlternativeFuelVehicleEligibility): self;
    public function setElectricRange(int $electricRange): self;
    public function setBaseMSRP(string $baseMSRP): self;
    public function setLegislativeDistrict(?string $legislativeDistrict): self;
    public function setDolVehicleID(int $dolVehicleID): self;
    public function setVehicleLocation(string $vehicleLocation): self;
    public function setElectricUtility(string $electricUtility): self;
    public function setCensusTract(int $censusTract): self;
}
