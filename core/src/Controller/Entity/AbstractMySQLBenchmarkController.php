<?php

namespace App\Controller\Entity;

use App\Controller\AbstractBenchmarkController;
use Symfony\Contracts\Translation\TranslatorInterface;

abstract class AbstractMySQLBenchmarkController extends AbstractBenchmarkController
{
    public function __construct(protected readonly TranslatorInterface $translator)
    {
    }

    protected function getDbType(): string
    {
        return $this->translator->trans('db.mysql');
    }
}
