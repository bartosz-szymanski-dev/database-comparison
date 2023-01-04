<?php

namespace App\Service\Action;

use App\Service\Factory\Entity\FactoryInterface;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\TabularDataReader;
use Symfony\Component\HttpKernel\KernelInterface;

class CreateActionService extends AbstractActionService
{
    private FactoryInterface $factory;

    public function __construct(private readonly KernelInterface $kernel)
    {
    }

    public function dispatchAction(): self
    {
        parent::dispatchAction();
        foreach ($this->getRecords() as $record) {
            $this->flushAndClear();
            $this->createAndPersist($record);
        }
        $this->executionTime = microtime(true) - $this->executionTime;

        return $this;
    }

    private function getRecords(): TabularDataReader
    {
        $path = sprintf('%s/Electric_Vehicle_Population_Data.csv', $this->kernel->getProjectDir());
        $csv = Reader::createFromPath($path)
            ->setDelimiter(',')
            ->setHeaderOffset(0);

        return (new Statement())->process($csv);
    }

    private function flushAndClear(): void
    {
        if ($this->rowCounter++ % 50 === 0) {
            $this->objectManager->flush();
            $this->objectManager->clear();
        }
    }

    private function createAndPersist(array $record): void
    {
        $data = $this->factory->createFromImportItem($record);
        $this->objectManager->persist($data);
    }

    public function withFactory(FactoryInterface $factory): self
    {
        $this->factory = $factory;

        return $this;
    }
}
