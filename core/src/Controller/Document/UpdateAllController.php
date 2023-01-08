<?php

namespace App\Controller\Document;

use App\Document\ElectricVehiclePopulationDataDocument;
use App\Service\Action\UpdateAllActionService;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateAllController extends AbstractMongoDbBenchmarkController
{
    #[Route(
        '/mongo-db/update-all',
        name: 'front.mongo_db.update_all',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(DocumentManager $documentManager, UpdateAllActionService $updateAllActionService): Response
    {
        ini_set('memory_limit', '4G');
        ini_set('max_execution_time', '600');
        $updateAllActionService
            ->withObjectClassName(ElectricVehiclePopulationDataDocument::class)
            ->withObjectManager($documentManager)
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
