<?php

namespace App\Service\Home;

use App\Model\Home\TabPane\TabPaneList;
use App\Service\Home\TabPane\MongoDbTabPane;
use App\Service\Home\TabPane\MySqlTabPane;

class TabPaneClient
{
    public function create(): array
    {
        $tabPaneList = new TabPaneList();
        $mongoDbPane = (new MongoDbTabPane())
            ->setNextPane(new MySqlTabPane());
        $mongoDbPane->apply($tabPaneList);

        return $tabPaneList->toArray();
    }
}
