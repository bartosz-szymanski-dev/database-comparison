<?php

namespace App\Tests\Controller\MySQL;

use App\Tests\Controller\AbstractControllerTest;

class UpdateAllControllerTest extends AbstractControllerTest
{
    private const MYSQL_UPDATE_ALL_URI = '/mysql/update-all';

    /**
     * @dataProvider defaultValidActionDataProvider
     */
    public function testDefaultValidAction(string $method): void
    {
        $this->makeRequest($method, self::MYSQL_UPDATE_ALL_URI);
        $this->assertResponseIsSuccessful();
    }

    public function defaultValidActionDataProvider(): array
    {
        return [
            'put' => ['PUT'],
            'patch' => ['PATCH'],
        ];
    }

    /**
     * @dataProvider defaultActionMethodIsNotAllowedDataProvider
     */
    public function testDefaultActionMethodIsNotAllowed(string $method): void
    {
        $this->makeRequest($method, self::MYSQL_UPDATE_ALL_URI);
        $this->assertResponseStatusCodeSame(405);
    }

    public function defaultActionMethodIsNotAllowedDataProvider(): array
    {
        return [
            'get' => ['GET'],
            'head' => ['HEAD'],
            'post' => ['POST'],
            'delete' => ['DELETE'],
        ];
    }
}
