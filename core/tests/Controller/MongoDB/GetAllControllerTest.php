<?php

namespace App\Tests\Controller\MongoDB;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetAllControllerTest extends WebTestCase
{
    public function testDefaultAction(): void
    {
        $client = static::createClient();
        $client->request('GET', '/mongo-db/get-all');
        $this->assertResponseIsSuccessful();
    }
}
