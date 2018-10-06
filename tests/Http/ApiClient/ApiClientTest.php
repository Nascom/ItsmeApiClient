<?php

namespace Nascom\ItsmeApiClient\Tests\Http\ApiClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;
use Nascom\ItsmeApiClient\Exception\ItsMeException;
use Nascom\ItsmeApiClient\Http\ApiClient\ApiClient;
use Nascom\ItsmeApiClient\Request\Status\RetrieveStatusRequest;
use Nascom\ItsmeApiClient\Request\Transaction\CreateTransactionRequest;
use Nascom\ItsmeApiClient\Response\Status\Status;
use Nascom\ItsmeApiClient\Response\Transaction\Transaction;
use Nascom\ItsmeApiClient\Tests\Data\SampleResponses;
use PHPUnit\Framework\TestCase;

class ApiClientTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     *   We're only checking if making a request succeeds, without any specific
     *   assertions.
     */
    public function testItCanPerformARequest()
    {
        $response = $this->sampleStatusResponse();
        $httpClient = $this->getClientWithExpectedResponse($response);
        $client = new ApiClient($httpClient);
        $request = new RetrieveStatusRequest('token');

        $client->handle($request);
    }

    public function testExtraOptionsCanBePassed()
    {
        $response = $this->sampleStatusResponse();
        $request = new RetrieveStatusRequest('token');
        $httpClient = $this->getClientWithExpectedResponse($response);
        $httpClient
            ->expects($this->once())
            ->method('request')
            ->with(
                $this->equalTo($request->getMethod()),
                $this->equalTo($request->getUri()),
                $this->callback(function ($argument) {
                    return isset($argument['extra'])
                        && $argument['extra'] === 'option';
                })
            );
        $client = new ApiClient($httpClient, ['extra' => 'option']);

        $client->handle($request);
    }

    public function testOptionsCanBeOverridden()
    {
        $response = $this->sampleStatusResponse();
        $request = new RetrieveStatusRequest('token');
        $httpClient = $this->getClientWithExpectedResponse($response);
        $httpClient
            ->expects($this->once())
            ->method('request')
            ->with(
                $this->equalTo($request->getMethod()),
                $this->equalTo($request->getUri()),
                $this->callback(function ($argument) {
                    return $argument['connect_timeout'] === 1.0;
                })
            );
        $client = new ApiClient($httpClient, ['connect_timeout' => 1.0]);

        $client->handle($request);
    }

    public function testStatusRequestsReturnsStatusResponse()
    {
        $response = $this->sampleStatusResponse();
        $httpClient = $this->getClientWithExpectedResponse($response);
        $client = new ApiClient($httpClient);
        $request = new RetrieveStatusRequest('token');

        $status = $client->handle($request);

        $this->assertInstanceOf(Status::class, $status);
    }

    public function testTransactionRequestsReturnsTransactionResponse()
    {
        $response = $this->sampleTransactionResponse();
        $httpClient = $this->getClientWithExpectedResponse($response);
        $client = new ApiClient($httpClient);
        $request = new CreateTransactionRequest('token', 'service', 'url');

        $transaction = $client->handle($request);

        $this->assertInstanceOf(Transaction::class, $transaction);
    }

    public function testAnExceptionIsThrownOnError()
    {
        $this->expectException(ItsMeException::class);

        $httpClient = $this->createMock(ClientInterface::class);
        $clientException = $this->createMock(ClientException::class);
        $httpClient
            ->method('request')
            ->willThrowException($clientException);
        $client = new ApiClient($httpClient);
        $request = new RetrieveStatusRequest('token');

        $client->handle($request);
    }

    private function getClientWithExpectedResponse($response)
    {
        $guzzleClientMock = $this->createMock(ClientInterface::class);
        $guzzleClientMock->method('request')->willReturn($response);

        return $guzzleClientMock;
    }

    private function sampleStatusResponse()
    {
        return new Response(
            200,
            [],
            json_encode(SampleResponses::statusSuccess())
        );
    }

    private function sampleTransactionResponse()
    {
        return new Response(
            200,
            [],
            json_encode(SampleResponses::transaction())
        );
    }
}
