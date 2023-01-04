<?php

namespace App\Controller\MongoDB;

use App\Service\Action\CreateActionService;
use App\Service\Factory\Entity\MongoDB\ElectricVehiclePopulationDataDocumentFactory;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateController extends AbstractController
{
    #[Route(
        '/mongo-db/create',
        name: 'front.mongo_db.create',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(
        DocumentManager $documentManager,
        ElectricVehiclePopulationDataDocumentFactory $evpDataFactory,
        CreateActionService $createActionService,
    ): Response {
        ini_set('memory_limit', '2G');
        $createActionService
            ->withObjectManager($documentManager)
            ->withFactory($evpDataFactory)
            ->dispatchAction();

        return $this->render('MongoDB/create.html.twig', [
            'rowCounter' => $createActionService->getRowCounter(),
            'executionTime' => $createActionService->getExecutionTime(),
        ]);
    }
}
