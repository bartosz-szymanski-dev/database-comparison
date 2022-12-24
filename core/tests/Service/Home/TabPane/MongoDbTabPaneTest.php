<?php

namespace App\Tests\Service\Home\TabPane;

use App\Model\Home\TabPane\TabPane;
use App\Model\Home\TabPane\TabPaneList;
use App\Service\Home\TabPane\MongoDbTabPane;
use PHPUnit\Framework\TestCase;

class MongoDbTabPaneTest extends TestCase
{
    private MongoDbTabPane $mongoDbTabPane;

    protected function setUp(): void
    {
        $this->mongoDbTabPane = new MongoDbTabPane();
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
        $expected->addTabPane($blankTabPane);

        $this->assertEquals($expected, $actual);
    }
}
