<?php

namespace App\Tests\Controller\MongoDB;

use App\Tests\Controller\AbstractControllerTest;

class CreateControllerTest extends AbstractControllerTest
{
    public function testDefaultAction(): void
    {
        $this->makeRequest('GET', '/mongo-db/create');
        $this->assertResponseIsSuccessful();
    }
}
