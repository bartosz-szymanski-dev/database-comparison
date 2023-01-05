<?php

namespace App\Controller\MongoDB;

use App\Document\ElectricVehiclePopulationDataDocument;
use App\Service\Action\GetAllActionService;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAllController extends AbstractMongoDbBenchmarkController
{
    #[Route(
        '/mongo-db/get-all',
        name: 'front.mongo_db.get_all',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(
        DocumentManager $documentManager,
        GetAllActionService $getAllActionService,
    ): Response {
        ini_set('memory_limit', '2G');
        $getAllActionService
            ->withObjectManager($documentManager)
            ->withObjectClassName(ElectricVehiclePopulationDataDocument::class)
            ->dispatchAction();

        return $this->renderBenchmark($getAllActionService);
    }
}
