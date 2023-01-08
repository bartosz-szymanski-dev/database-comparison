<?php

namespace App\Service\Factory;

use App\Model\DataInterface;

interface FactoryInterface
{
    public function createFromImportItem(array $item): DataInterface;
}
