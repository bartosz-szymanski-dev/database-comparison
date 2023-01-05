<?php

namespace App\Controller\MongoDB;

use App\Controller\AbstractBenchmarkController;
use Symfony\Contracts\Translation\TranslatorInterface;

abstract class AbstractMongoDbBenchmarkController extends AbstractBenchmarkController
{
    public function __construct(private readonly TranslatorInterface $translator)
    {
    }

    protected function getDbType(): string
    {
        return $this->translator->trans('db.mongo');
    }
}
