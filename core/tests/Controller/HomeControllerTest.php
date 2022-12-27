<?php

namespace App\Tests\Controller;

class HomeControllerTest extends AbstractControllerTest
{
    /**
     * @dataProvider defaultActionSuccessfulDataProvider
     */
    public function testDefaultActionSuccessful(string $method): void
    {
        $this->makeRequest('GET', '/');
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
        $this->makeRequest($method, '/');
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
