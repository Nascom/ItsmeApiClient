<?php

namespace Nascom\ItsmeApiClient\Response\Status;

/**
 * Class Address
 *
 * @package Nascom\ItsmeApiClient\Response\Status
 */
class Address
{

    /**
     * @var string
     */
    private $streetAddress;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @param array $data
     *
     * @return Address
     */
    public static function fromArray(array $data) {
        $address = new self();

        $address->streetAddress = $data['streetAddress'];
        $address->postalCode = $data['postalCode'];
        $address->city = $data['city'];
        $address->countryCode = $data['countryCode'];

        return $address;
    }

    /**
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }
}
