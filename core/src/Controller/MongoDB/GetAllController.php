<?php

namespace App\Controller\MongoDB;

use App\Entity\MongoDB\ElectricVehiclePopulationDataDocument;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAllController extends AbstractController
{
    #[Route(
        '/mongo-db/get-all',
        name: 'front.mongo_db.get_all',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(DocumentManager $documentManager): Response
    {
        ini_set('memory_limit', '2G');
        $evpRepository = $documentManager->getRepository(ElectricVehiclePopulationDataDocument::class);
        $startingTime = microtime(true);
        $items = $evpRepository->findAll();
        $endTime = microtime(true) - $startingTime;

        return $this->render('MongoDB/get_all.html.twig', [
            'queryExecutionTime' => round($endTime, 2),
            'recordCount' => count($items),
        ]);
    }
}
