<?php

namespace Nascom\ItsmeApiClient\Http\ApiClient;

use Nascom\ItsmeApiClient\Request\RequestInterface;

/**
 * Interface ApiClientInterface
 *
 * @package Nascom\ItsmeApiClient\Http
 */
interface ApiClientInterface
{

    /**
     * @param RequestInterface $query
     */
    public function handle(RequestInterface $query);
}