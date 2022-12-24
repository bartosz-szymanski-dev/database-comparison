<?php

namespace App\Tests\Service\Home;

use App\Model\Home\TabPane\TabPane;
use App\Service\Home\Button\MongoDB\CreateButtonBuilder;
use App\Service\Home\Button\MongoDB\GetAllButtonBuilder;
use App\Service\Home\TabPane\MongoDbTabPane;
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
        $mongoDbTabPane = new MongoDbTabPane(
            new CreateButtonBuilder($this->urlGenerator),
            new GetAllButtonBuilder($this->urlGenerator),
        );
        $this->tabPaneClient = new TabPaneClient($mongoDbTabPane);
    }

    private function initMockUrlGenerator(): void
    {
        $this->urlGenerator
            ->expects($this->any())
            ->method('generate')
            ->willReturn('/mongo-db/create', '/mongo-db/get-all');
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
