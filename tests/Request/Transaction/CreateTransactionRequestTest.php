<?php

namespace Nascom\ItsmeApiClient\Tests\Request\Transaction;

use Nascom\ItsmeApiClient\Request\Transaction\CreateTransactionRequest;
use PHPUnit\Framework\TestCase;

class CreateTransactionRequestTest extends TestCase
{
    public function testTheBodyContainsTheRequiredParameters()
    {
        $request = $this->sampleRequest();

        $body = $request->getBody();

        $this->assertArrayHasKey('token', $body);
        $this->assertArrayHasKey('service', $body);
        $this->assertArrayHasKey('redirectUrl', $body);
    }

    public function testTheBodyContainsOnlyThePassedParameters()
    {
        $request = $this->sampleRequest();

        $body = $request->getBody();

        $this->assertCount(3, $body);
    }

    /**
     * @dataProvider optionalValuesProvider
     */
    public function testItSetsTheOptionalParameters($key, $value, $setter)
    {
        $request = $this->sampleRequest();
        $request->$setter($value);

        $body = $request->getBody();

        $this->assertEquals($body[$key], $value);
    }

    public function optionalValuesProvider()
    {
        return [
            'locale parameter' => ['locale', 'nl', 'setLocale'],
            'scopes parameter' => ['scopes', ['address'], 'setScopes'],
            'phone parameter' => ['phoneNumber', '+123', 'setPhoneNumber'],
        ];
    }

    private function sampleRequest()
    {
        return new CreateTransactionRequest('token', 'service', 'url');
    }
}
