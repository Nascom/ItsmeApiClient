<?php

namespace Nascom\ItsmeApiClient\Request;

/**
 * Class AbstractGetQuery
 *
 * @package Nascom\ItsmeApiClient\Request
 */
abstract class AbstractGetRequest extends AbstractRequest
{

    /**
     * @inheritdoc
     */
    public function getMethod()
    {
        return 'GET';
    }
}
