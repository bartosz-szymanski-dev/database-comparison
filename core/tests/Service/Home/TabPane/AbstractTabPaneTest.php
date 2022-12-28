<?php

namespace App\Tests\Service\Home\TabPane;

use App\Model\Home\Button;
use App\Service\Home\TabPane\AbstractTabPaneBuilder;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

abstract class AbstractTabPaneTest extends TestCase
{
    protected UrlGeneratorInterface $urlGenerator;

    abstract protected function initMockUrlGenerator();

    abstract protected function getDbTabPane(): AbstractTabPaneBuilder;

    abstract protected function getCreateButton(): Button;

    abstract protected function getGetAllButton(): Button;

    abstract protected function getUpdateAllButton(): Button;

    abstract protected function getDeleteAllButton(): Button;

    protected function setUp(): void
    {
        $this->urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $this->initMockUrlGenerator();
    }
}
