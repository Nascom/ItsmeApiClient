<?php

namespace Nascom\ItsmeApiClient\Tests\Data;

class SampleResponses
{
    public static function statusSuccess()
    {
        return [
            'status' => 'success',
            'userId' => 'QC1JJ6AgPTnDWTP3p6p3S1kMzPkLCVN41vzfaTxw',
            'name' => [
                'givenName' => 'Lucas',
                'familyName' => 'Maes',
                'fullName' => 'Lucas Maes'
            ],
            'gender' => 'male',
            'birthdate' => '1974-01-31',
            'locale' => 'nl',
            'phoneNumber' => '+32471234567',
            'emailAddress' => 'noreply@cmdisp.com',
            'address' => [
                'streetAddress' => 'Rue Neuve 1',
                'postalCode' => '1000',
                'city' => 'Bruxelles',
                'countryCode' => 'BE'
            ]
        ];
    }

    public static function transaction()
    {
        return [
            'transactionToken' => 'SMDhN88yYlE3ug2mUzSsma7Vb3GFBXV61tLgJEYVwJVZ9623kECl7A5p4uqIat2W',
            'authenticationUrl' => 'https://merchant.itsme.be/oidc/authorization...'
        ];
    }

    public static function badRequest()
    {
        return [
            'status' => 400,
            'message' => 'Some field is incorrect'
        ];
    }
}
