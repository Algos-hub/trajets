<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class GreetingsTest extends ApiTestCase
{
    public function testCreateGreeting(): void
    {
        static::createClient()->request('POST', '/students', [
            'json' => [
                'name' => 'Kevin',
                'surName' => 'Bacon',
                'address' => '72 boulevard davout',
                'postalCode' => 75020,
            ],
            'headers' => [
                'Content-Type' => 'application/ld+json',
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/contexts/Student',
            '@type' => 'Student',
            'name' => 'Kevin',
            'surName' => 'Bacon',
            'address' => '72 boulevard davout',
            'postalCode' => 75020,
        ]);
    }
}
