<?php

namespace App\Controller\Entity;

use App\Entity\ElectricVehiclePopulationDataEntity;
use App\Service\Action\DeleteAllActionServiceBulk;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteAllController extends AbstractMySQLBenchmarkController
{
    #[Route(
        path: '/mysql/delete-all',
        name: 'front.mysql.delete_all',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(
        EntityManagerInterface $entityManager,
        DeleteAllActionServiceBulk $deleteAllActionServiceBulk,
    ): Response {
        $deleteAllActionServiceBulk
            ->withObjectManager($entityManager)
            ->withObjectClassName(ElectricVehiclePopulationDataEntity::class)
            ->dispatchAction();

        return $this->renderBenchmark($deleteAllActionServiceBulk);
    }

    protected function getPageTitle(): string
    {
        return sprintf(
            '%s - %s',
            $this->getDbType(),
            $this->translator->trans('action_type.delete_all'),
        );
    }
}
