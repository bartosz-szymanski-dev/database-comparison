<?php

namespace App\Service\Home\TabPane;

use App\Model\Home\TabPane\TabPane;
use App\Model\Home\TabPane\TabPaneList;
use App\Service\Home\Button\AbstractButtonBuilder;
use App\Service\Home\Button\MongoDB\CreateButtonBuilder;
use App\Service\Home\Button\MongoDB\DeleteAllButtonBuilder;
use App\Service\Home\Button\MongoDB\GetAllButtonBuilder;
use App\Service\Home\Button\MongoDB\UpdateAllButtonBuilder;

class MongoDbTabPane extends AbstractTabPaneBuilder
{
    private array $buttonBuilders;

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
            ->setId('mongo-db-tab')
            ->setTarget('mongo-db-tab-pane')
            ->setName('MongoDB');
        $this->addButtons($tabPane);
        $tabPaneList->addTabPane($tabPane);

        return parent::apply($tabPaneList);
    }

    private function addButtons(TabPane $tabPane): void
    {
        /** @var AbstractButtonBuilder $buttonBuilder */
        foreach ($this->buttonBuilders as $buttonBuilder) {
            $tabPane->addButton($buttonBuilder->create());
        }
    }
}
