<?php

namespace Nascom\ItsmeApiClient\Request;

/**
 * Class AbstractPostRequest
 *
 * @package Nascom\ItsmeApiClient\Request
 */
abstract class AbstractPostRequest extends AbstractRequest
{

    /**
     * @inheritdoc
     */
    public function getMethod()
    {
        return 'POST';
    }
}
