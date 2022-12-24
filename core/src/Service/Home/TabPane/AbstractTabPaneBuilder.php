<?php

namespace App\Service\Home\TabPane;

use App\Model\Home\TabPane\TabPaneList;

abstract class AbstractTabPaneBuilder
{
    protected ?AbstractTabPaneBuilder $nextPane = null;

    public function setNextPane(AbstractTabPaneBuilder $nextPane): self
    {
        $this->nextPane = $nextPane;

        return $this;
    }

    public function apply(TabPaneList $tabPaneList): void
    {
        $this->nextPane?->apply($tabPaneList);
    }
}
