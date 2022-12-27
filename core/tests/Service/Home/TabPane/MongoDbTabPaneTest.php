<?php

namespace App\Tests\Service\Home\TabPane;

use App\Model\Home\Button;
use App\Model\Home\TabPane\TabPane;
use App\Model\Home\TabPane\TabPaneList;
use App\Service\Home\Button\MongoDB\CreateButtonBuilder;
use App\Service\Home\Button\MongoDB\GetAllButtonBuilder;
use App\Service\Home\Button\MongoDB\UpdateAllButtonBuilder;
use App\Service\Home\TabPane\MongoDbTabPane;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class MongoDbTabPaneTest extends TestCase
{
    private UrlGeneratorInterface $urlGenerator;
    private MongoDbTabPane $mongoDbTabPane;

    protected function setUp(): void
    {
        $this->urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $this->initMockUrlGenerator();
        $this->mongoDbTabPane = new MongoDbTabPane(
            new CreateButtonBuilder($this->urlGenerator),
            new GetAllButtonBuilder($this->urlGenerator),
            new UpdateAllButtonBuilder($this->urlGenerator),
        );
    }

    private function initMockUrlGenerator(): void
    {
        $this->urlGenerator
            ->expects($this->any())
            ->method('generate')
            ->willReturn(
                '/mongo-db/create',
                '/mongo-db/get-all',
                '/mongo-db/update-all'
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
            ->addButton($this->getUpdateAllButton());
        $expected->addTabPane($blankTabPane);

        $this->assertEquals($expected, $actual);
    }

    public function getCreateButton(): Button
    {
        return (new Button())
            ->setText('Stwórz dane')
            ->setUrl('/mongo-db/create');
    }

    public function getGetAllButton(): Button
    {
        return (new Button())
            ->setText('Odczytaj dane')
            ->setUrl('/mongo-db/get-all')
            ->setColorClassName('btn-success');
    }

    private function getUpdateAllButton(): Button
    {
        return (new Button())
            ->setText('Zaktualizuj dane')
            ->setUrl('/mongo-db/update-all')
            ->setColorClassName('btn-danger');
    }
}
