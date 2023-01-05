<?php

namespace App\Controller\MongoDB;

use App\Service\Action\CreateActionServiceBulk;
use App\Service\Factory\Entity\MongoDB\ElectricVehiclePopulationDataDocumentFactory;
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
        $createActionService
            ->withObjectManager($documentManager)
            ->withFactory($evpDataFactory)
            ->dispatchAction();

        return $this->renderBenchmark($createActionService);
    }
}
