<?php

namespace App\Repository;

use App\Entity\ElectricVehiclePopulationDataEntity;
use App\Service\RandomStringGenerator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ElectricVehiclePopulationDataEntity>
 *
 * @method ElectricVehiclePopulationDataEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ElectricVehiclePopulationDataEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ElectricVehiclePopulationDataEntity[]    findAll()
 * @method ElectricVehiclePopulationDataEntity[]findBy(array $criteria,array $orderBy=null,$limit=null,$offset=null)
 */
class ElectricVehiclePopulationDataEntityRepository extends ServiceEntityRepository implements
    ElectricVehiclePopulationDataRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElectricVehiclePopulationDataEntity::class);
    }

    public function save(ElectricVehiclePopulationDataEntity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ElectricVehiclePopulationDataEntity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function deleteAll(): int
    {
        $qb = $this->createQueryBuilder('e');
        $count = $qb
            ->select($qb->expr()->count('e.id'))
            ->getQuery()
            ->getSingleScalarResult();

        $this
            ->createQueryBuilder('e')
            ->delete()
            ->getQuery()
            ->execute();

        return $count;
    }

    public function updateAll(): void
    {
        $randomStringGenerator = new RandomStringGenerator();
        $parameters = [
            'vin' => $randomStringGenerator->generate(),
            'county' => $randomStringGenerator->generate(),
            'city' => $randomStringGenerator->generate(),
            'state' => $randomStringGenerator->generate(),
            'postalCode' => rand(10000, 99999),
            'modelYear' => rand(2005, 2023),
            'make' => $randomStringGenerator->generate(),
            'model' => $randomStringGenerator->generate(),
            'electricVehicleType' => $randomStringGenerator->generate(),
            'cleanAlternativeFuelVehicleEligibility' => $randomStringGenerator->generate(),
            'electricRange' => rand(20, 800),
            'baseMSRP' => rand(0, PHP_INT_MAX - 1),
            'legislativeDistrict' => rand(0, 10) === 5 ? $randomStringGenerator->generate() : null,
            'dolVehicleID' => rand(0, PHP_INT_MAX - 1),
            'vehicleLocation' => $randomStringGenerator->generate(),
            'electricUtility' => rand(0, 10) === 5 ? $randomStringGenerator->generate() : null,
            'censusTract' => rand(0, PHP_INT_MAX - 1),
        ];
        $this
            ->createQueryBuilder('e')
            ->update()
            ->set('e.vin', ':vin')
            ->set('e.county', ':county')
            ->set('e.city', ':city')
            ->set('e.state', ':state')
            ->set('e.postalCode', ':postalCode')
            ->set('e.modelYear', ':modelYear')
            ->set('e.make', ':make')
            ->set('e.model', ':model')
            ->set('e.electricVehicleType', ':electricVehicleType')
            ->set('e.cleanAlternativeFuelVehicleEligibility', ':cleanAlternativeFuelVehicleEligibility')
            ->set('e.electricRange', ':electricRange')
            ->set('e.baseMSRP', ':baseMSRP')
            ->set('e.legislativeDistrict', ':legislativeDistrict')
            ->set('e.dolVehicleID', ':dolVehicleID')
            ->set('e.vehicleLocation', ':vehicleLocation')
            ->set('e.electricUtility', ':electricUtility')
            ->set('e.censusTract', ':censusTract')
            ->setParameters($parameters)
            ->getQuery()
            ->execute();
    }
}
