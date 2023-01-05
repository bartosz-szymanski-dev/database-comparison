<?php

namespace App\Service\Action;

use App\Repository\ElectricVehiclePopulationDataRepositoryInterface;

class DeleteAllActionServiceBulk extends BulkFlushActionService
{
    private string $objectClassName;

    public function dispatchAction(): self
    {
        parent::dispatchAction();
        /** @var ElectricVehiclePopulationDataRepositoryInterface $repository */
        $repository = $this->objectManager->getRepository($this->objectClassName);
        $this->rowCounter = $repository->deleteAll();
        $this->setExecutionTime();

        return $this;
    }

    private function processItemDelete(mixed $item): void
    {
        $this->bulkFlushAndClear();
        $this->objectManager->remove($item);
    }

    public function withObjectClassName(string $objectClassName): self
    {
        $this->objectClassName = $objectClassName;

        return $this;
    }
}
