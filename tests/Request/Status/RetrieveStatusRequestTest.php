<?php

namespace Nascom\ItsmeApiClient\Tests\Request\Status;

use Nascom\ItsmeApiClient\Request\Status\RetrieveStatusRequest;
use PHPUnit\Framework\TestCase;

class RetrieveStatusRequestTest extends TestCase
{
    public function testTheBodyContainsTheToken()
    {
        $token = 'some-token';
        $request = new RetrieveStatusRequest($token);

        $body = $request->getBody();

        $this->assertEquals($body['token'], $token);
    }
}
