<?php

namespace App\Repository;

use App\Entity\MySQL\ElectricVehiclePopulationDataEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
        $count = $this
            ->createQueryBuilder('e')
            ->select('count(e.id)')
            ->getQuery()
            ->getScalarResult();

        $this
            ->createQueryBuilder('e')
            ->delete()
            ->getQuery()
            ->execute();

        return $count;
    }
}
