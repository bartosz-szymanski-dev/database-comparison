<?php

namespace App\Service\Home\TabPane;

use App\Model\Home\TabPane\TabPane;
use App\Model\Home\TabPane\TabPaneList;
use App\Service\Home\Button\MySQL\CreateButtonBuilder;
use App\Service\Home\Button\MySQL\DeleteAllButtonBuilder;
use App\Service\Home\Button\MySQL\GetAllButtonBuilder;
use App\Service\Home\Button\MySQL\UpdateAllButtonBuilder;

class MySqlTabPane extends AbstractTabPaneBuilder
{
    public function __construct(
        private readonly CreateButtonBuilder $createButtonBuilder,
        private readonly GetAllButtonBuilder $getAllButtonBuilder,
        private readonly UpdateAllButtonBuilder $updateAllButtonBuilder,
        private readonly DeleteAllButtonBuilder $deleteAllButtonBuilder,
    ) {
        $this->buttonBuilders = [
            $this->createButtonBuilder,
            $this->getAllButtonBuilder,
            $this->updateAllButtonBuilder,
            $this->deleteAllButtonBuilder,
        ];
    }

    public function apply(TabPaneList $tabPaneList): self
    {
        $tabPane = (new TabPane())
            ->setId('mysql-tab')
            ->setTarget('mysql-tab-pane')
            ->setName('MySQL');
        $this->addButtons($tabPane);
        $tabPaneList->addTabPane($tabPane);

        return parent::apply($tabPaneList);
    }
}
