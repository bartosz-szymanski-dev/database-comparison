<?php

namespace App\Service\Action;

use App\Service\Factory\Entity\FactoryInterface;
use Doctrine\Persistence\ObjectManager;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\TabularDataReader;
use Symfony\Component\HttpKernel\KernelInterface;

class CreateActionService
{
    private int $rowCounter;

    private ObjectManager $objectManager;
    private FactoryInterface $factory;

    public function __construct(private readonly KernelInterface $kernel)
    {
    }

    public function dispatchAction(): self
    {
        $this->rowCounter = 0;
        foreach ($this->getRecords() as $record) {
            $this->flushAndClear();
            $this->createAndPersist($record);
        }

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

    public function getRowCounter(): int
    {
        return $this->rowCounter ?? 0;
    }

    public function withObjectManager(ObjectManager $objectManager): self
    {
        $this->objectManager = $objectManager;

        return $this;
    }

    public function withFactory(FactoryInterface $factory): self
    {
        $this->factory = $factory;

        return $this;
    }
}
