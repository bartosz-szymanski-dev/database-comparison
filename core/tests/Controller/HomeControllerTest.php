<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    /**
     * @dataProvider defaultActionSuccessfulDataProvider
     */
    public function testDefaultActionSuccessful(string $method): void
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
    }

    public function defaultActionSuccessfulDataProvider(): array
    {
        return [
            'get' => ['GET'],
            'head' => ['HEAD'],
        ];
    }

    /**
     * @dataProvider methodsOtherThanGETOrHEADAreNotAllowed
     */
    public function testMethodsOtherThanGETOrHEADAreNotAllowed(string $method): void
    {
        $client = static::createClient();
        $client->request($method, '/');
        $this->assertResponseStatusCodeSame(405);
    }

    public function methodsOtherThanGETOrHEADAreNotAllowed(): array
    {
        return [
            'post' => ['POST'],
            'put' => ['PUT'],
            'patch' => ['PATCH'],
            'delete' => ['DELETE'],
        ];
    }
}
