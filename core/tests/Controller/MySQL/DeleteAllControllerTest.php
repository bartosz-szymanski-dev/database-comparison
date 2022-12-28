<?php

namespace App\Tests\Controller\MySQL;

use App\Tests\Controller\AbstractControllerTest;

class DeleteAllControllerTest extends AbstractControllerTest
{
    private const MYSQL_DELETE_ALL_URI = '/mysql/delete-all';

    public function testDefaultValidAction(): void
    {
        $this->makeRequest('DELETE', self::MYSQL_DELETE_ALL_URI);
        $this->assertResponseIsSuccessful();
    }

    /**
     * @dataProvider defaultActionMethodIsNotAllowedDataProvider
     */
    public function testDefaultActionMethodIsNotAllowed(string $method): void
    {
        $this->makeRequest($method, self::MYSQL_DELETE_ALL_URI);
        $this->assertResponseStatusCodeSame(405);
    }

    public function defaultActionMethodIsNotAllowedDataProvider(): array
    {
        return [
            'get' => ['GET'],
            'head' => ['HEAD'],
            'post' => ['POST'],
            'put' => ['PUT'],
            'PATCH' => ['PATCH'],
        ];
    }
}
