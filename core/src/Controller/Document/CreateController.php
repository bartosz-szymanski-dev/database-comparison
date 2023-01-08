<?php

namespace App\Controller\Document;

use App\Service\Action\CreateActionServiceBulk;
use App\Service\Factory\ElectricVehiclePopulationDataDocumentFactory;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateController extends AbstractMongoDbBenchmarkController
{
    #[Route(
        '/mongo-db/create',
        name: 'front.mongo_db.create',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(
        DocumentManager $documentManager,
        ElectricVehiclePopulationDataDocumentFactory $evpDataFactory,
        CreateActionServiceBulk $createActionService,
    ): Response {
        ini_set('memory_limit', '2G');
        ini_set('max_execution_time', '600');
        $createActionService
            ->withObjectManager($documentManager)
            ->withFactory($evpDataFactory)
            ->dispatchAction();

        return $this->renderBenchmark($createActionService);
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
