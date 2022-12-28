<?php

namespace App\Tests\Service\Home;

use App\Model\Home\TabPane\TabPane;
use App\Service\Home\Button\MongoDB\CreateButtonBuilder as MongoCreateButtonBuilder;
use App\Service\Home\Button\MongoDB\DeleteAllButtonBuilder as MongoDeleteAllButtonBuilder;
use App\Service\Home\Button\MongoDB\GetAllButtonBuilder as MongoGetAllButtonBuilder;
use App\Service\Home\Button\MongoDB\UpdateAllButtonBuilder as MongoUpdateAllButtonBuilder;
use App\Service\Home\Button\MySQL\CreateButtonBuilder as MySQLCreateButtonBuilder;
use App\Service\Home\Button\MySQL\DeleteAllButtonBuilder as MySQLDeleteAllButtonBuilder;
use App\Service\Home\Button\MySQL\GetAllButtonBuilder as MySQLGetAllButtonBuilder;
use App\Service\Home\Button\MySQL\UpdateAllButtonBuilder as MySQLUpdateAllButtonBuilder;
use App\Service\Home\TabPane\MongoDbTabPane;
use App\Service\Home\TabPane\MySqlTabPane;
use App\Service\Home\TabPaneClient;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class TabPaneClientTest extends TestCase
{
    private UrlGeneratorInterface $urlGenerator;
    private TabPaneClient $tabPaneClient;

    protected function setUp(): void
    {
        $this->urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $this->initMockUrlGenerator();
        $mongoDbTabPane = $this->getMockedMongoDbTabPane();
        $mysqlTabPane = $this->getMockedMysqlTabPane();
        $this->tabPaneClient = new TabPaneClient($mongoDbTabPane, $mysqlTabPane);
    }

    private function getMockedMongoDbTabPane(): MongoDbTabPane
    {
        return new MongoDbTabPane(
            new MongoCreateButtonBuilder($this->urlGenerator),
            new MongoGetAllButtonBuilder($this->urlGenerator),
            new MongoUpdateAllButtonBuilder($this->urlGenerator),
            new MongoDeleteAllButtonBuilder($this->urlGenerator),
        );
    }

    private function getMockedMysqlTabPane(): MySqlTabPane
    {
        return new MySqlTabPane(
            new MySQLCreateButtonBuilder($this->urlGenerator),
            new MySQLGetAllButtonBuilder($this->urlGenerator),
            new MySQLUpdateAllButtonBuilder($this->urlGenerator),
            new MySQLDeleteAllButtonBuilder($this->urlGenerator),
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
                '/mongo-db/update-all',
                '/mongo-db/delete-all',
                '/mysql/create',
                '/mysql/get-all',
                '/mysql/update-all',
                '/mysql/delete-all',
            );
    }

    public function testCreate(): void
    {
        $actual = $this->tabPaneClient->create();
        $this->assertCount(2, $actual);
        foreach ($actual as $tabPane) {
            $this->assertInstanceOf(TabPane::class, $tabPane);
        }
    }
}
