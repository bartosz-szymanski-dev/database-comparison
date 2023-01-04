<?php

namespace App\Tests\Controller\MySQL;

use App\Tests\Controller\AbstractControllerTest;

class CreateControllerTest extends AbstractControllerTest
{
    private const MYSQL_CREATE_URI = '/mysql/create';

    public function testDefaultValidAction(): void
    {
        $this->makeRequest('GET', self::MYSQL_CREATE_URI);
        $this->assertResponseIsSuccessful();
    }

    /**
     * @dataProvider defaultActionMethodIsNotAllowedDataProvider
     */
    public function testDefaultActionMethodIsNotAllowed(string $method): void
    {
        $this->makeRequest($method, self::MYSQL_CREATE_URI);
        $this->assertResponseStatusCodeSame(405);
    }

    public function defaultActionMethodIsNotAllowedDataProvider(): array
    {
        return [
            'put' => ['PUT'],
            'patch' => ['PATCH'],
            'delete' => ['DELETE'],
        ];
    }
}
