<?php

namespace App\Service\Home\TabPane;

use App\Model\Home\TabPane\TabPane;
use App\Model\Home\TabPane\TabPaneList;
use App\Service\Home\Button\MongoDB\CreateButtonBuilder;
use App\Service\Home\Button\MongoDB\GetAllButtonBuilder;

class MongoDbTabPane extends AbstractTabPaneBuilder
{
    public function __construct(
        private readonly CreateButtonBuilder $createButtonBuilder,
        private readonly GetAllButtonBuilder $getAllButtonBuilder,
    ) {
    }

    public function apply(TabPaneList $tabPaneList): self
    {
        $tabPane = (new TabPane())
            ->setId('mongo-db-tab')
            ->setTarget('mongo-db-tab-pane')
            ->setName('MongoDB');
        $this->createButtonBuilder->apply($tabPane);
        $this->getAllButtonBuilder->apply($tabPane);
        $tabPaneList->addTabPane($tabPane);

        return parent::apply($tabPaneList);
    }
}
