<?php

namespace App\Tests\Controller\MongoDB;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UpdateAllControllerTest extends WebTestCase
{
    /**
     * @dataProvider defaultActionDataProvider
     */
    public function testDefaultAction(string $method): void
    {
        $client = static::createClient();
        $client->request($method, '/mongo-db/update-all');
        $this->assertResponseIsSuccessful();
    }

    public function defaultActionDataProvider(): array
    {
        return [
            'post' => ['POST'],
            'put' => ['PUT'],
            'patch' => ['PATCH'],
        ];
    }
}
