<?php

namespace Nascom\ItsmeApiClient\Response\Status;

/**
 * Class Name
 *
 * @package Nascom\ItsmeApiClient\Response\Status
 */
class Name
{

    /**
     * @var string
     */
    private $givenName;

    /**
     * @var string
     */
    private $familyName;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @param array $data
     *
     * @return Name
     */
    public static function fromArray($data = []) {
        $name = new self();

        $name->givenName = $data['givenName'];
        $name->familyName = $data['familyName'];
        $name->fullName = $data['fullName'];

        return $name;
    }

    /**
     * @return string
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * @return string
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }
}