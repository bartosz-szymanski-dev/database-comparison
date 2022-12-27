<?php

namespace App\Tests\Controller\MySQL;

use App\Tests\Controller\AbstractControllerTest;

class GetAllControllerTest extends AbstractControllerTest
{
    private const MYSQL_GET_ALL_URI = '/mysql/get-all';

    /**
     * @dataProvider defaultValidActionDataProvider
     */
    public function testDefaultValidAction(string $method): void
    {
        $this->makeRequest($method, self::MYSQL_GET_ALL_URI);
        $this->assertResponseIsSuccessful();
    }

    public function defaultValidActionDataProvider(): array
    {
        return [
            'get' => ['GET'],
            'head' => ['HEAD'],
        ];
    }

    /**
     * @dataProvider defaultActionMethodIsNotAllowedDataProvider
     */
    public function testDefaultActionMethodIsNotAllowed(string $method): void
    {
        $this->makeRequest($method, self::MYSQL_GET_ALL_URI);
        $this->assertResponseStatusCodeSame(405);
    }

    public function defaultActionMethodIsNotAllowedDataProvider(): array
    {
        return [
            'post' => ['POST'],
            'put' => ['PUT'],
            'patch' => ['PATCH'],
            'delete' => ['DELETE'],
        ];
    }
}
