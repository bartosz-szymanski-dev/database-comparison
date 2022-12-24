<?php

namespace App\Tests\Service\Home\TabPane;

use App\Model\Home\TabPane\TabPane;
use App\Model\Home\TabPane\TabPaneList;
use App\Service\Home\TabPane\MySqlTabPane;
use PHPUnit\Framework\TestCase;

class MySqlTabPaneTest extends TestCase
{
    private MySqlTabPane $mySqlTabPane;

    protected function setUp(): void
    {
        $this->mySqlTabPane = new MySqlTabPane();
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
        $expected->addTabPane($blankTabPane);

        $this->assertEquals($expected, $actual);
    }
}
