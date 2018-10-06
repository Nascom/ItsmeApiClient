<?php

namespace Nascom\ItsmeApiClient\Tests\Response\Status;

use Nascom\ItsmeApiClient\Response\Status\Address;
use Nascom\ItsmeApiClient\Tests\Data\SampleResponses;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    /**
     * @dataProvider keyAndGetterProvider
     */
    public function testItExtractsAddressData($dataKey, $getter)
    {
        $data = $this->sampleAddressData();

        $address = Address::fromArray($data);

        $this->assertEquals($data[$dataKey], $address->$getter());
    }

    public function keyAndGetterProvider()
    {
        return [
            'parses street' => ['streetAddress', 'getStreetAddress'],
            'parses postal code' => ['postalCode', 'getPostalCode'],
            'parses city' => ['city', 'getCity'],
            'parses country code' => ['countryCode', 'getCountryCode']
        ];
    }

    private function sampleAddressData()
    {
        return SampleResponses::statusSuccess()['address'];
    }
}
