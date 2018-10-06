<?php

namespace Nascom\ItsmeApiClient\Http\ApiClient;

use Nascom\ItsmeApiClient\Exception\ItsMeException;
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
     * @throws ItsMeException
     */
    public function handle(RequestInterface $query);
}
