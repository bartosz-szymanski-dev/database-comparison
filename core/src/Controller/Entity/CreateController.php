<?php

namespace App\Controller\Entity;

use App\Service\Action\CreateActionServiceBulk;
use App\Service\Factory\ElectricVehiclePopulationDataEntityFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateController extends AbstractMySQLBenchmarkController
{
    #[Route(
        path: '/mysql/create',
        name: 'front.mysql.create',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(
        EntityManagerInterface $entityManager,
        ElectricVehiclePopulationDataEntityFactory $factory,
        CreateActionServiceBulk $createActionServiceBulk,
    ): Response {
        ini_set('memory_limit', '2G');
        ini_set('max_execution_time', '600');
        $createActionServiceBulk
            ->withObjectManager($entityManager)
            ->withFactory($factory)
            ->dispatchAction();

        return $this->renderBenchmark($createActionServiceBulk);
    }

    protected function getPageTitle(): string
    {
        return sprintf(
            '%s - %s',
            $this->getDbType(),
            $this->translator->trans('action_type.create'),
        );
    }
}
