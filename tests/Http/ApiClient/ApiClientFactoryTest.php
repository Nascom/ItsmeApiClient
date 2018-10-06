<?php

namespace Nascom\ItsmeApiClient\Tests\Http\ApiClient;

use Nascom\ItsmeApiClient\Http\ApiClient\ApiClientFactory;
use Nascom\ItsmeApiClient\Http\ApiClient\ApiClientInterface;
use PHPUnit\Framework\TestCase;

class ApiClientFactoryTest extends TestCase
{
    public function testItInstantiatesASandboxAPiClient()
    {
        $client = ApiClientFactory::sandbox();

        $this->assertInstanceOf(ApiClientInterface::class, $client);
    }

    public function testItInstantiatesAProductionAPiClient()
    {
        $client = ApiClientFactory::production();

        $this->assertInstanceOf(ApiClientInterface::class, $client);
    }
}
