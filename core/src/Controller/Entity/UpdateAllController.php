<?php

namespace App\Controller\Entity;

use App\Entity\ElectricVehiclePopulationDataEntity;
use App\Service\Action\UpdateAllActionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateAllController extends AbstractMySQLBenchmarkController
{
    #[Route(
        path: '/mysql/update-all',
        name: 'front.mysql.update_all',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(
        EntityManagerInterface $entityManager,
        UpdateAllActionService $updateAllActionService,
    ): Response {
        $updateAllActionService
            ->withObjectManager($entityManager)
            ->withObjectClassName(ElectricVehiclePopulationDataEntity::class)
            ->dispatchAction();

        return $this->renderBenchmark($updateAllActionService);
    }

    protected function getPageTitle(): string
    {
        return sprintf(
            '%s - %s',
            $this->getDbType(),
            $this->translator->trans('action_type.update_all'),
        );
    }
}
