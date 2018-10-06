<?php

namespace Nascom\ItsmeApiClient\Http\ApiClient;

use GuzzleHttp\Exception\ClientException;
use Nascom\ItsmeApiClient\Exception\InvalidParametersException;
use Nascom\ItsmeApiClient\Exception\ItsMeException;
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
        $options = $this->options;
        $requestBody = $request->getBody();
        if (!empty($requestBody)) {
            $options['form_params'] = $requestBody;
        }

        try {
            $response = $this->guzzleClient->request(
                $request->getMethod(),
                $request->getUri(),
                $options
            );
        }
        catch (ClientException $e) {
            $this->handleClientException($e);
        }
        catch (\Exception $e) {
            throw ItsMeException::fromException($e);
        }

        $body = $response->getBody()->getContents();
        $jsonResponse = json_decode($body, true);

        return call_user_func(
            [$request->getResponseClass(), 'fromArray'],
            $jsonResponse
        );
    }

    /**
     * @param ClientException $e
     * @throws ItsMeException
     */
    private function handleClientException(ClientException $e)
    {
        $response = $e->getResponse();
        if (!$response || $response->getStatusCode() !== 400) {
            throw ItsMeException::fromException($e);
        }

        // Provide the feedback of the bad request as the exception message.
        $message = $response->getBody()->getContents();
        $message = json_decode($message, true);
        if (isset($message['message'], $message['status'])) {
            throw new InvalidParametersException(
                $message['message'],
                $message['status']
            );
        }
    }
}
