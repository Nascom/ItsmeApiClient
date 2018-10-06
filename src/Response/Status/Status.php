<?php

namespace Nascom\ItsmeApiClient\Response\Status;

/**
 * Class Status
 *
 * @package Nascom\ItsmeApiClient\Response\Status
 */
class Status
{

    const OPEN = 'open';
    const SUCCESS = 'success';
    const CANCELLED = 'cancelled';
    const FAILURE = 'failure';
    const EXPIRED = 'expired';
    const FAILED = 'failed';

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var Name
     */
    private $name;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var \DateTime
     */
    private $birthdate;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $emailAddress;

    /**
     * @var Address
     */
    private $address;

    /**
     * RetrieveStatusResponse constructor.
     *
     * @param $status
     */
    private function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * @param array $data
     *
     * @return Status
     */
    public static function fromArray($data = [])
    {
        $status = new self(
            $data['status']
        );

        $status->userId = isset($data['userId']) ? $data['userId'] : null;
        $status->gender = isset($data['gender']) ? $data['gender'] : null;
        $status->birthdate = isset($data['birthdate']) ? new \DateTime(
            $data['birthdate']
        ) : null;
        $status->locale = isset($data['locale']) ? $data['locale'] : null;
        $status->phoneNumber = isset($data['phoneNumber']) ? $data['phoneNumber'] : null;
        $status->emailAddress = isset($data['emailAddress']) ? $data['emailAddress'] : null;

        $status->name = isset($data['name']) ? Name::fromArray(
            $data['name']
        ) : new Name();
        $status->address = isset($data['address']) ? Address::fromArray(
            $data['address']
        ) : new Address();

        return $status;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}
