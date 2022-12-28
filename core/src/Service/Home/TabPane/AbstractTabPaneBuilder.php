<?php

namespace App\Service\Home\TabPane;

use App\Model\Home\TabPane\TabPane;
use App\Model\Home\TabPane\TabPaneList;
use App\Service\Home\Button\AbstractButtonBuilder;

abstract class AbstractTabPaneBuilder
{
    protected array $buttonBuilders = [];
    protected ?AbstractTabPaneBuilder $nextPane = null;

    public function setNextPane(AbstractTabPaneBuilder $nextPane): self
    {
        $this->nextPane = $nextPane;

        return $this;
    }

    public function apply(TabPaneList $tabPaneList): self
    {
        $this->nextPane?->apply($tabPaneList);

        return $this;
    }

    protected function addButtons(TabPane $tabPane): void
    {
        /** @var AbstractButtonBuilder $buttonBuilder */
        foreach ($this->buttonBuilders as $buttonBuilder) {
            $tabPane->addButton($buttonBuilder->create());
        }
    }
}
