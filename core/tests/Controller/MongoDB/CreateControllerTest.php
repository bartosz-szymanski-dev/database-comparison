<?php

namespace App\Tests\Controller\MongoDB;

use App\Tests\Controller\AbstractControllerTest;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CreateControllerTest extends AbstractControllerTest
{
    public function testDefaultAction(): void
    {
        $this->makeRequest('POST', '/mongo-db/create');
        $this->assertResponseIsSuccessful();
    }
}
