<?php

namespace App\Repository;

use Doctrine\ODM\MongoDB\MongoDBException;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

class ElectricVehiclePopulationDataDocumentRepository extends DocumentRepository implements
    ElectricVehiclePopulationDataRepositoryInterface
{
    /**
     * @throws MongoDBException
     */
    public function deleteAll(): int
    {
        return $this
            ->createQueryBuilder()
            ->remove()
            ->getQuery()
            ->execute()
            ->getDeletedCount();
    }
}
