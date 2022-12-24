<?php

namespace App\Service\Home;

use App\Model\Home\TabPane\TabPaneList;
use App\Service\Home\TabPane\MongoDbTabPane;
use App\Service\Home\TabPane\MySqlTabPane;

class TabPaneClient
{
    public function __construct(private readonly MongoDbTabPane $mongoDbTabPane)
    {
    }

    public function create(): array
    {
        $tabPaneList = new TabPaneList();
        $this->mongoDbTabPane
            ->setNextPane(new MySqlTabPane())
            ->apply($tabPaneList);

        return $tabPaneList->toArray();
    }
}
