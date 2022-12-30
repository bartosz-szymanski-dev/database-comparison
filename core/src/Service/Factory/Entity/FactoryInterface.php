<?php

namespace App\Service\Factory\Entity;

use App\Entity\DataInterface;

interface FactoryInterface
{
    public function createFromImportItem(array $item): DataInterface;
}
