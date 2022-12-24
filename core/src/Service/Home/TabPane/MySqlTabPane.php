<?php

namespace App\Service\Home\TabPane;

use App\Model\Home\TabPane\TabPane;
use App\Model\Home\TabPane\TabPaneList;

class MySqlTabPane extends AbstractTabPaneBuilder
{
    public function apply(TabPaneList $tabPaneList): void
    {
        $tabPane = (new TabPane())
            ->setId('mysql-tab')
            ->setTarget('mysql-tab-pane')
            ->setName('MySQL');
        $tabPaneList->addTabPane($tabPane);

        parent::apply($tabPaneList);
    }
}
