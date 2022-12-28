<?php

namespace App\Model\Home\TabPane;

use App\Model\AbstractModel;

class TabPaneList extends AbstractModel
{
    public function addTabPane(TabPane $tabPane): self
    {
        $this->data[] = $tabPane;

        return $this;
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
