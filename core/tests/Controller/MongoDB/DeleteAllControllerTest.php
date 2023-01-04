<?php

namespace App\Tests\Controller\MongoDB;

use App\Tests\Controller\AbstractControllerTest;

class DeleteAllControllerTest extends AbstractControllerTest
{
    private const MONGO_DB_DELETE_ALL_URI = '/mongo-db/delete-all';

    public function testDefaultValidAction(): void
    {
        $this->makeRequest('GET', self::MONGO_DB_DELETE_ALL_URI);
        $this->assertResponseIsSuccessful();
    }

    /**
     * @dataProvider defaultActionMethodIsNotAllowedDataProvider
     */
    public function testDefaultActionMethodIsNotAllowed(string $method): void
    {
        $this->makeRequest($method, self::MONGO_DB_DELETE_ALL_URI);
        $this->assertResponseStatusCodeSame(405);
    }

    public function defaultActionMethodIsNotAllowedDataProvider(): array
    {
        return [
            'post' => ['POST'],
            'put' => ['PUT'],
            'patch' => ['PATCH'],
        ];
    }
}
