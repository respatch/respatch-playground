<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testStatusWithoutTokenReturnsUnauthorized(): void
    {
        $client = static::createClient();
        
        $client->request('GET', '/_respatch/api/status');
        
        $this->assertResponseStatusCodeSame(401);
    }

    public function testStatusWithInvalidTokenReturnsUnauthorized(): void
    {
        $client = static::createClient();
        
        $client->request('GET', '/_respatch/api/status', [], [], [
            'HTTP_X_RESPATCH_TOKEN' => 'invalid_token',
        ]);
        
        $this->assertResponseStatusCodeSame(401);
    }

    public function testStatusWithValidTokenReturnsOk(): void
    {
        $client = static::createClient();
        
        $token = $_ENV['RESPATCH_TOKEN'] ?? 'some_secure_hash_token_123_test';
        
        $client->request('GET', '/_respatch/api/status', [], [], [
            'HTTP_X_RESPATCH_TOKEN' => $token,
        ]);
        
        $this->assertResponseIsSuccessful();
        
        $responseContent = $client->getResponse()->getContent();
        $this->assertJson($responseContent);
        $data = json_decode($responseContent, true);
        $this->assertArrayHasKey('status', $data);
        $this->assertSame('OK', $data['status']);
    }
}
