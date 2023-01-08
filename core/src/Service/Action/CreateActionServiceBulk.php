<?php

namespace App\Service\Action;

use App\Service\Factory\FactoryInterface;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\TabularDataReader;
use Symfony\Component\HttpKernel\KernelInterface;

class CreateActionServiceBulk extends BulkFlushActionService
{
    private FactoryInterface $factory;

    public function __construct(private readonly KernelInterface $kernel)
    {
    }

    public function dispatchAction(): self
    {
        parent::dispatchAction();
        foreach ($this->getRecords() as $record) {
            $this->bulkFlushAndClear();
            $this->createAndPersist($record);
        }
        $this->setExecutionTime();

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
