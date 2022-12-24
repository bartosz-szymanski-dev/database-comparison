<?php

namespace App\Model\Home\TabPane;

class TabPaneList
{
    private array $items = [];

    public function addTabPane(TabPane $tabPane): self
    {
        $this->items[] = $tabPane;

        return $this;
    }

    public function toArray(): array
    {
        return $this->items;
    }
}
