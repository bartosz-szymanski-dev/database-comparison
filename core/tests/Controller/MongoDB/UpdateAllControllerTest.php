<?php

namespace App\Tests\Controller\MongoDB;

use App\Tests\Controller\AbstractControllerTest;

class UpdateAllControllerTest extends AbstractControllerTest
{
    /**
     * @dataProvider defaultActionDataProvider
     */
    public function testDefaultAction(string $method): void
    {
        $this->makeRequest($method, '/mongo-db/update-all');
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
