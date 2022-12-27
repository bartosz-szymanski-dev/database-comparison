<?php

namespace App\Tests\Controller\MongoDB;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CreateControllerTest extends WebTestCase
{
    public function testDefaultAction(): void
    {
        $client = static::createClient();
        $client->request('POST', '/mongo-db/create');
        $this->assertResponseIsSuccessful();
    }
}
