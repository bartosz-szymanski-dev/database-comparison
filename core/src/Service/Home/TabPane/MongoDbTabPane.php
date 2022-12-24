<?php

namespace App\Service\Home\TabPane;

use App\Model\Home\TabPane\TabPane;
use App\Model\Home\TabPane\TabPaneList;

class MongoDbTabPane extends AbstractTabPaneBuilder
{
    public function apply(TabPaneList $tabPaneList): void
    {
        $tabPane = (new TabPane())
            ->setId('mongo-db-tab')
            ->setTarget('mongo-db-tab-pane')
            ->setName('MongoDB');
        $tabPaneList->addTabPane($tabPane);

        parent::apply($tabPaneList);
    }
}
