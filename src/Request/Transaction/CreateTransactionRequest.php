<?php

namespace Nascom\ItsmeApiClient\Request\Transaction;

use Nascom\ItsmeApiClient\Request\AbstractPostRequest;
use Nascom\ItsmeApiClient\Response\Transaction\Transaction;

/**
 * Class CreateTransactionRequest
 *
 * @package Nascom\ItsmeApiClient\Request\Transaction
 */
class CreateTransactionRequest extends AbstractPostRequest
{

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $service;

    /**
     * @var array
     */
    private $scope = [];

    /**
     * @var string
     */
    private $locale;

    /**
     * @var string
     */
    private $redirectUrl;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * CreateTransactionRequest constructor.
     *
     * @param $token
     * @param $service
     * @param $redirectUrl
     */
    public function __construct($token, $service, $redirectUrl)
    {
        $this->token = $token;
        $this->service = $service;
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * @param array $scope
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return 'transactions';
    }

    /**
     * @return string
     */
    public function getResponseClass() {
        return Transaction::class;
    }
}