<?php

namespace App\Tests\Service\Home;

use App\Model\Home\TabPane\TabPane;
use App\Service\Home\TabPaneClient;
use PHPUnit\Framework\TestCase;

class TabPaneClientTest extends TestCase
{
    private TabPaneClient $tabPaneClient;

    protected function setUp(): void
    {
        $this->tabPaneClient = new TabPaneClient();
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
