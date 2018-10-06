<?php

namespace Nascom\ItsmeApiClient\Http\ApiClient;

use GuzzleHttp\Client;

/**
 * Class ApiClientFactory
 *
 * @package Nascom\ItsmeApiClient\Http\ApiClient
 */
class ApiClientFactory
{
    /**
     * @param array $options
     * @return ApiClient
     */
    public static function production(array $options = [])
    {
        return self::fromUri(Service::PRODUCTION, $options);
    }

    /**
     * @param array $options
     * @return ApiClient
     */
    public static function sandbox(array $options = [])
    {
        return self::fromUri(Service::SANDBOX, $options);
    }

    /**
     * @param string $uri
     * @param array $options
     * @return ApiClient
     */
    private static function fromUri($uri, array $options = [])
    {
        $httpClient = new Client(['base_uri' => $uri]);
        return new ApiClient($httpClient, $options);
    }
}
