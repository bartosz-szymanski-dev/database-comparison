<?php

namespace App\Service\Action;

class GetAllActionService extends AbstractActionService
{
    private string $objectClassName;

    public function dispatchAction(): self
    {
        $repository = $this->objectManager->getRepository($this->objectClassName);
        parent::dispatchAction();
        $items = $repository->findAll();
        $this->executionTime = microtime(true) - $this->executionTime;
        $this->rowCounter = count($items);

        return $this;
    }

    public function withObjectClassName(string $objectClassName): self
    {
        $this->objectClassName = $objectClassName;

        return $this;
    }
}
