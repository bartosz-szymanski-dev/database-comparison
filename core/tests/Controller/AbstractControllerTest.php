<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class AbstractControllerTest extends WebTestCase
{
    protected function makeRequest(string $method, string $uri): void
    {
        static::createClient()->request($method, $uri);
    }
}
