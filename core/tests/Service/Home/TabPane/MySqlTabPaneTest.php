<?php

namespace App\Tests\Service\Home\TabPane;

use App\Model\Home\Button;
use App\Model\Home\TabPane\TabPane;
use App\Model\Home\TabPane\TabPaneList;
use App\Service\Home\Button\MySQL\CreateButtonBuilder;
use App\Service\Home\Button\MySQL\DeleteAllButtonBuilder;
use App\Service\Home\Button\MySQL\GetAllButtonBuilder;
use App\Service\Home\Button\MySQL\UpdateAllButtonBuilder;
use App\Service\Home\TabPane\MySqlTabPane;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class MySqlTabPaneTest extends AbstractTabPaneTest
{
    private MySqlTabPane $mySqlTabPane;

    protected function setUp(): void
    {
        $this->urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $this->initMockUrlGenerator();
        $this->mySqlTabPane = $this->getDbTabPane();
    }

    public function testApply(): void
    {
        $actual = new TabPaneList();
        $this->mySqlTabPane->apply($actual);
        $expected = new TabPaneList();
        $blankTabPane = (new TabPane())
            ->setId('mysql-tab')
            ->setTarget('mysql-tab-pane')
            ->setName('MySQL');

        $blankTabPane
            ->addButton($this->getCreateButton())
            ->addButton($this->getGetAllButton())
            ->addButton($this->getUpdateAllButton())
            ->addButton($this->getDeleteAllButton());
        $expected->addTabPane($blankTabPane);

        $this->assertEquals($expected, $actual);
    }

    protected function initMockUrlGenerator()
    {
        $this->urlGenerator
            ->expects($this->any())
            ->method('generate')
            ->willReturn(
                '/mysql/create',
                '/mysql/get-all',
                '/mysql/update-all',
                '/mysql/delete-all',
            );
    }

    protected function getDbTabPane(): MySqlTabPane
    {
        return new MySqlTabPane(
            new CreateButtonBuilder($this->urlGenerator),
            new GetAllButtonBuilder($this->urlGenerator),
            new UpdateAllButtonBuilder($this->urlGenerator),
            new DeleteAllButtonBuilder($this->urlGenerator),
        );
    }

    protected function getCreateButton(): Button
    {
        return (new Button())
            ->setText('Stwórz dane')
            ->setUrl('/mysql/create');
    }

    protected function getGetAllButton(): Button
    {
        return (new Button())
            ->setText('Odczytaj dane')
            ->setUrl('/mysql/get-all')
            ->setColorClassName('btn-success');
    }

    protected function getUpdateAllButton(): Button
    {
        return (new Button())
            ->setText('Zaktualizuj dane')
            ->setUrl('/mysql/update-all')
            ->setColorClassName('btn-danger');
    }

    protected function getDeleteAllButton(): Button
    {
        return (new Button())
            ->setText('Usuń wszystkie dane')
            ->setUrl('/mysql/delete-all')
            ->setColorClassName('btn-warning');
    }
}
