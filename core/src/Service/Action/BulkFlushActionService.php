<?php

namespace App\Service\Action;

abstract class BulkFlushActionService extends AbstractActionService
{
    protected function bulkFlushAndClear(): void
    {
        if ($this->rowCounter++ % 50 === 0) {
            $this->objectManager->flush();
        }
    }
}
