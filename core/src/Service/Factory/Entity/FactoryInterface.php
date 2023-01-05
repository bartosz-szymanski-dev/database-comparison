<?php

namespace App\Service\Factory\Entity;

use App\Model\DataInterface;

interface FactoryInterface
{
    public function createFromImportItem(array $item): DataInterface;
}
