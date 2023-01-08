<?php

namespace App\Repository;

use App\Service\RandomStringGenerator;
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

    /**
     * @throws MongoDBException
     */
    public function updateAll(): void
    {
        $randomStringGenerator = new RandomStringGenerator();
        $this
            ->createQueryBuilder()
            ->updateMany()
            ->field('vin')->set($randomStringGenerator->generate())
            ->field('county')->set($randomStringGenerator->generate())
            ->field('city')->set($randomStringGenerator->generate())
            ->field('state')->set($randomStringGenerator->generate())
            ->field('postalCode')->set(rand(10000, 99999))
            ->field('modelYear')->set(rand(2005, 2023))
            ->field('make')->set($randomStringGenerator->generate())
            ->field('model')->set($randomStringGenerator->generate())
            ->field('electricVehicleType')->set($randomStringGenerator->generate())
            ->field('cleanAlternativeFuelVehicleEligibility')->set($randomStringGenerator->generate())
            ->field('electricRange')->set(rand(20, 800))
            ->field('baseMSRP')->set($randomStringGenerator->generate())
            ->field('legislativeDistrict')->set(rand(0, 10) === 5 ? $randomStringGenerator->generate() : null)
            ->field('dolVehicleID')->set(rand(0, PHP_INT_MAX - 1))
            ->field('vehicleLocation')->set($randomStringGenerator->generate())
            ->field('electricUtility')->set($randomStringGenerator->generate())
            ->field('censusTract')->set(rand(0, PHP_INT_MAX - 1))
            ->getQuery()
            ->execute();
    }
}
