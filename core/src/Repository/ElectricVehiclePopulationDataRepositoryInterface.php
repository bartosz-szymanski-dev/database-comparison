<?php

namespace App\Repository;

interface ElectricVehiclePopulationDataRepositoryInterface
{
    public function deleteAll(): int;

    public function updateAll();
}
