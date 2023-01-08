<?php

namespace App\Service\Action;

use App\Repository\ElectricVehiclePopulationDataRepositoryInterface;
use App\Service\RandomStringGenerator;

class UpdateAllActionService extends BulkFlushActionService
{
    private string $objectClassName;

    public function dispatchAction(): self
    {
        /** @var ElectricVehiclePopulationDataRepositoryInterface $repository */
        $repository = $this->objectManager->getRepository($this->objectClassName);
        parent::dispatchAction();
        $repository->updateAll();
        $this->setExecutionTime();

        return $this;
    }

    public function withObjectClassName(string $objectClassName): self
    {
        $this->objectClassName = $objectClassName;

        return $this;
    }
}
