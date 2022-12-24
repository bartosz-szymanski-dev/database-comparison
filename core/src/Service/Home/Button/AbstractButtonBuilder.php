<?php

namespace App\Service\Home\Button;

use App\Model\Home\TabPane\TabPane;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

abstract class AbstractButtonBuilder
{
    abstract public function apply(TabPane $tabPane): void;

    public function __construct(protected readonly UrlGeneratorInterface $urlGenerator)
    {
    }
}
