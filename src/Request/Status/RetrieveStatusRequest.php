<?php

namespace Nascom\ItsmeApiClient\Request\Status;

use Nascom\ItsmeApiClient\Request\AbstractGetRequest;
use Nascom\ItsmeApiClient\Response\Status\Status;

/**
 * Class RetrieveTransactionStatusRequest
 *
 * @package Nascom\ItsmeApiClient\Request\Transaction
 */
class RetrieveStatusRequest extends AbstractGetRequest
{

    /**
     * @var string
     */
    private $token;

    /**
     * RetrieveStatusRequest constructor.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return 'status/' . $this->token;
    }

    /**
     * @return string
     */
    public function getResponseClass() {
        return Status::class;
    }
}