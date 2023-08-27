<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiTest extends WebTestCase
{
    public function testApiEndpoint()
    {
        $client=self::createClient();
        $client->request(
            'GET',
            '/api'
        ); 

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}