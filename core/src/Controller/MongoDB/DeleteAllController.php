<?php

namespace App\Controller\MongoDB;

use App\Document\ElectricVehiclePopulationDataDocument;
use App\Service\Action\DeleteAllActionServiceBulk;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteAllController extends AbstractMongoDbBenchmarkController
{
    #[Route(
        path: '/mongo-db/delete-all',
        name: 'front.mongo_db.delete_all',
        methods: ['GET', 'HEAD']
    )]
    public function __invoke(
        DocumentManager $documentManager,
        DeleteAllActionServiceBulk $deleteAllActionService,
    ): Response {
        $deleteAllActionService
            ->withObjectManager($documentManager)
            ->withObjectClassName(ElectricVehiclePopulationDataDocument::class)
            ->dispatchAction();

        return $this->renderBenchmark($deleteAllActionService);
    }
}
