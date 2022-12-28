<?php

namespace App\Tests\Service\Home\TabPane;

use App\Model\Home\Button;
use App\Model\Home\TabPane\TabPane;
use App\Model\Home\TabPane\TabPaneList;
use App\Service\Home\Button\MongoDB\CreateButtonBuilder;
use App\Service\Home\Button\MongoDB\DeleteAllButtonBuilder;
use App\Service\Home\Button\MongoDB\GetAllButtonBuilder;
use App\Service\Home\Button\MongoDB\UpdateAllButtonBuilder;
use App\Service\Home\TabPane\MongoDbTabPane;

class MongoDbTabPaneTest extends AbstractTabPaneTest
{
    private MongoDbTabPane $mongoDbTabPane;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mongoDbTabPane = $this->getDbTabPane();
    }

    protected function getDbTabPane(): MongoDbTabPane
    {
        return new MongoDbTabPane(
            new CreateButtonBuilder($this->urlGenerator),
            new GetAllButtonBuilder($this->urlGenerator),
            new UpdateAllButtonBuilder($this->urlGenerator),
            new DeleteAllButtonBuilder($this->urlGenerator),
        );
    }

    protected function initMockUrlGenerator(): void
    {
        $this->urlGenerator
            ->expects($this->any())
            ->method('generate')
            ->willReturn(
                '/mongo-db/create',
                '/mongo-db/get-all',
                '/mongo-db/update-all',
                '/mongo-db/delete-all',
            );
    }

    public function testApply(): void
    {
        $actual = new TabPaneList();
        $this->mongoDbTabPane->apply($actual);
        $expected = new TabPaneList();
        $blankTabPane = (new TabPane())
            ->setId('mongo-db-tab')
            ->setTarget('mongo-db-tab-pane')
            ->setName('MongoDB');

        $blankTabPane
            ->addButton($this->getCreateButton())
            ->addButton($this->getGetAllButton())
            ->addButton($this->getUpdateAllButton())
            ->addButton($this->getDeleteAllButton());
        $expected->addTabPane($blankTabPane);

        $this->assertEquals($expected, $actual);
    }

    protected function getCreateButton(): Button
    {
        return (new Button())
            ->setText('Stwórz dane')
            ->setUrl('/mongo-db/create');
    }

    protected function getGetAllButton(): Button
    {
        return (new Button())
            ->setText('Odczytaj dane')
            ->setUrl('/mongo-db/get-all')
            ->setColorClassName('btn-success');
    }

    protected function getUpdateAllButton(): Button
    {
        return (new Button())
            ->setText('Zaktualizuj dane')
            ->setUrl('/mongo-db/update-all')
            ->setColorClassName('btn-danger');
    }

    protected function getDeleteAllButton(): Button
    {
        return (new Button())
            ->setText('Usuń wszystkie dane')
            ->setUrl('/mongo-db/delete-all')
            ->setColorClassName('btn-warning');
    }
}
