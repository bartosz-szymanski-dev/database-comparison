<?php

namespace App\Controller\Entity;

use App\Entity\ElectricVehiclePopulationDataEntity;
use App\Service\Action\GetAllActionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAllController extends AbstractMySQLBenchmarkController
{
    #[Route(
        path: '/mysql/get-all',
        name: 'front.mysql.get_all',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(
        EntityManagerInterface $entityManager,
        GetAllActionService $getAllActionService,
    ): Response {
        $getAllActionService
            ->withObjectManager($entityManager)
            ->withObjectClassName(ElectricVehiclePopulationDataEntity::class)
            ->dispatchAction();

        return $this->renderBenchmark($getAllActionService);
    }

    protected function getPageTitle(): string
    {
        return sprintf(
            '%s-%s',
            $this->getDbType(),
            $this->translator->trans('action_type.get_all'),
        );
    }
}
