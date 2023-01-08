<?php

namespace App\Controller\Document;

use App\Controller\AbstractBenchmarkController;
use Symfony\Contracts\Translation\TranslatorInterface;

abstract class AbstractMongoDbBenchmarkController extends AbstractBenchmarkController
{
    public function __construct(protected readonly TranslatorInterface $translator)
    {
    }

    protected function getDbType(): string
    {
        return $this->translator->trans('db.mongo');
    }
}
