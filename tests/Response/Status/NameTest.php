<?php

namespace Nascom\ItsmeApiClient\Tests\Response\Status;

use Nascom\ItsmeApiClient\Response\Status\Name;
use Nascom\ItsmeApiClient\Tests\Data\SampleResponses;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    /**
     * @dataProvider keyAndGetterProvider
     */
    public function testItExtractsAddressData($dataKey, $getter)
    {
        $data = $this->sampleNameData();

        $address = Name::fromArray($data);

        $this->assertEquals($data[$dataKey], $address->$getter());
    }

    public function keyAndGetterProvider()
    {
        return [
            'parses given name' => ['givenName', 'getGivenName'],
            'parses family name' => ['familyName', 'getFamilyName'],
            'parses full name' => ['fullName', 'getFullName'],
        ];
    }

    private function sampleNameData()
    {
        return SampleResponses::statusSuccess()['name'];
    }
}
