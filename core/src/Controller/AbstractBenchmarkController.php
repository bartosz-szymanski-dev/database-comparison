<?php

namespace App\Controller;

use App\Service\Action\AbstractActionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractBenchmarkController extends AbstractController
{
    abstract protected function getDbType(): string;

    protected function renderBenchmark(AbstractActionService $service): Response
    {
        return $this->render(
            'benchmark.html.twig',
            $this->getParameters($service),
        );
    }

    private function getParameters(AbstractActionService $service): array
    {
        return [
            'dbType' => $this->getDbType(),
            'executionTime' => round($service->getExecutionTime(), 2),
            'recordCount' => $service->getRowCounter(),
        ];
    }
}
