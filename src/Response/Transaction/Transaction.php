<?php

namespace Nascom\ItsmeApiClient\Response\Transaction;

/**
 * Class Transaction
 *
 * @package Nascom\ItsmeApiClient\Response\Transaction
 */
class Transaction
{

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $authenticationUrl;

    /**
     * Transaction constructor.
     *
     * @param $token
     * @param $authenticationUrl
     */
    private function __construct($token, $authenticationUrl)
    {
        $this->token = $token;
        $this->authenticationUrl = $authenticationUrl;
    }

    /**
     * @param array $data
     *
     * @return Transaction
     */
    public static function fromArray($data = [])
    {
        return new self(
            $data['transactionToken'],
            $data['authenticationUrl']
        );
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getAuthenticationUrl()
    {
        return $this->authenticationUrl;
    }
}