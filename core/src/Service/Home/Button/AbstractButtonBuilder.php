<?php

namespace App\Service\Home\Button;

use App\Model\Home\Button;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

abstract class AbstractButtonBuilder
{
    abstract public function create(): Button;

    public function __construct(protected readonly UrlGeneratorInterface $urlGenerator)
    {
    }
}
