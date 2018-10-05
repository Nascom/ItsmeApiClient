<?php

namespace Nascom\ItsmeApiClient\Http\ApiClient;

use Nascom\ItsmeApiClient\Exception\InvalidParametersException;
use Nascom\ItsmeApiClient\Exception\ServerException;
use GuzzleHttp\ClientInterface;
use Nascom\ItsmeApiClient\Request\RequestInterface;

/**
 * Class ApiClient
 *
 * @package Nascom\ItsmeApiClient\Http
 */
class ApiClient implements ApiClientInterface
{

    /**
     * @var ClientInterface
     */
    protected $guzzleClient;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * ApiClient constructor.
     *
     * @param ClientInterface $guzzleClient
     * @param array $options
     */
    public function __construct
    (
        ClientInterface $guzzleClient,
        array $options = []
    ) {
        $this->guzzleClient = $guzzleClient;
        $this->options = array_merge(
            [
                'connect_timeout' => 3.0,
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ],
            $options
        );
    }

    /**
     * @inheritdoc
     */
    public function handle(RequestInterface $request)
    {
        $response = $this->guzzleClient->request(
            $request->getMethod(),
            $request->getUri(),
            $this->options
        );

        $body = $response
            ->getBody()
            ->getContents();
        $jsonResponse = json_decode($body);

        // Check for API error
        switch ($response->getStatusCode()) {
            case 400:
                throw new InvalidParametersException($jsonResponse['message'], $jsonResponse['status']);
            case 500;
                throw new ServerException('Unexpected server error', 500);
        }

        return call_user_func_array([$request->getResponseClass(), 'fromArray'], $jsonResponse);
    }
}