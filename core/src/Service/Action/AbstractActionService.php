<?php

namespace App\Service\Action;

use Doctrine\Persistence\ObjectManager;

abstract class AbstractActionService
{
    protected int $rowCounter;
    protected float $executionTime;

    protected ObjectManager $objectManager;

    public function dispatchAction(): self
    {
        $this->rowCounter = 0;
        $this->executionTime = microtime(true);

        return $this;
    }

    public function getRowCounter(): int
    {
        return $this->rowCounter ?? 0;
    }

    public function getExecutionTime(): float
    {
        return $this->executionTime ?? 0.0;
    }

    public function withObjectManager(ObjectManager $objectManager): self
    {
        $this->objectManager = $objectManager;

        return $this;
    }

    protected function setExecutionTime(): void
    {
        $this->executionTime = microtime(true) - $this->executionTime;
    }
}
