<?php

namespace App\Tests\Controller\MongoDB;

use App\Tests\Controller\AbstractControllerTest;

class GetAllControllerTest extends AbstractControllerTest
{
    public function testDefaultAction(): void
    {
        $this->makeRequest('GET', '/mongo-db/get-all');
        $this->assertResponseIsSuccessful();
    }
}
