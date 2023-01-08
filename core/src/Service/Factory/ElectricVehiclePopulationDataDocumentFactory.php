<?php

namespace App\Service\Factory;

use App\Document\ElectricVehiclePopulationDataDocument;

class ElectricVehiclePopulationDataDocumentFactory implements FactoryInterface
{
    public function createFromImportItem(array $item): ElectricVehiclePopulationDataDocument
    {
        return (new ElectricVehiclePopulationDataDocument())
            ->setVin($item['VIN'])
            ->setCounty($item['County'])
            ->setCity($item['City'])
            ->setState($item['State'])
            ->setPostalCode($item['PostalCode'])
            ->setModelYear($item['ModelYear'])
            ->setMake($item['Make'])
            ->setModel($item['Model'])
            ->setElectricVehicleType($item['ElectricVehicleType'])
            ->setCleanAlternativeFuelVehicleEligibility($item['CleanAlternativeFuelVehicleEligibility'])
            ->setElectricRange($item['ElectricRange'])
            ->setBaseMSRP($item['BaseMSRP'])
            ->setLegislativeDistrict($item['LegislativeDistrict'])
            ->setDolVehicleID($item['DOLVehicleID'])
            ->setVehicleLocation($item['VehicleLocation'])
            ->setElectricUtility($item['ElectricUtility'])
            ->setCensusTract($item['CensusTract']);
    }
}
