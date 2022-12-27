<?php

namespace App\Tests\Controller\MongoDB;

use App\Tests\Controller\AbstractControllerTest;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetAllControllerTest extends AbstractControllerTest
{
    public function testDefaultAction(): void
    {
        $this->makeRequest('GET', '/mongo-db/get-all');
        $this->assertResponseIsSuccessful();
    }
}
