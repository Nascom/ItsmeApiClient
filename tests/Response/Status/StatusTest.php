<?php

namespace Nascom\ItsmeApiClient\Tests\Response\Status;

use Nascom\ItsmeApiClient\Response\Status\Address;
use Nascom\ItsmeApiClient\Response\Status\Name;
use Nascom\ItsmeApiClient\Response\Status\Status;
use Nascom\ItsmeApiClient\Tests\Data\SampleResponses;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    public function testItCanBeCreatedWithoutAnyOptionalFields()
    {
        $data = ['status' => Status::FAILED];

        $status = Status::fromArray($data);

        $this->assertInstanceOf(Status::class, $status);
    }

    public function testItProvidesEmptyDefaultObjects()
    {
        $data = ['status' => Status::FAILED];

        $status = Status::fromArray($data);

        $this->assertInstanceOf(Address::class, $status->getAddress());
        $this->assertInstanceOf(Name::class, $status->getName());
    }

    /**
     * @dataProvider keyAndGetterProvider
     */
    public function testItParsesScalarProperties($dataKey, $getter)
    {
        $data = SampleResponses::statusSuccess();

        $status = Status::fromArray($data);

        $this->assertEquals($data[$dataKey], $status->$getter());
    }

    public function testItParsesBirthDateAsDateTime()
    {
        $data = SampleResponses::statusSuccess();

        $status = Status::fromArray($data);

        $this->assertInstanceOf(\DateTime::class, $status->getBirthdate());
        $this->assertEquals(
            new \DateTime($data['birthdate']),
            $status->getBirthdate()
        );
    }

    public function testItParsesAddress()
    {
        $data = SampleResponses::statusSuccess();

        $status = Status::fromArray($data);

        $this->assertEquals(
            Address::fromArray($data['address']),
            $status->getAddress()
        );
    }

    public function testItParsesName()
    {
        $data = SampleResponses::statusSuccess();

        $status = Status::fromArray($data);

        $this->assertEquals(
            Name::fromArray($data['name']),
            $status->getName()
        );
    }

    public function keyAndGetterProvider()
    {
        return [
            'parses status' => ['status', 'getStatus'],
            'parses user ID' => ['userId', 'getUserId'],
            'parses gender' => ['gender', 'getGender'],
            'parses locale' => ['locale', 'getLocale'],
            'parses phone number' => ['phoneNumber', 'getPhoneNumber'],
            'parses e-mail address' => ['emailAddress', 'getEmailAddress']
        ];
    }
}
