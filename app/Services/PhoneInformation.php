<?php

namespace App\Services;

class PhoneInformation
{
    private const INVALID_CONTRY_CODE = 'Invalid country code';

    private const INVALID_COUNTRY_NAME = 'Invalid country name';

    private const COUNTRIES = [
        '237' => [
            'countryName' => 'Cameroon',
            'validationRules' => "/[2368]\d{7,8}/",
        ],
        '251' => [
            'countryName' => 'Ethiopia',
            'validationRules' => "/[1-59]\d{8}$/",
        ],
        '212' => [
            'countryName' => 'Morocco',
            'validationRules' => "/[5-9]\d{8}$/",
        ],
        '258' => [
            'countryName' => 'Mozambique',
            'validationRules' => "/[28]\d{7,8}$/",
        ],
        '256' => [
            'countryName' => 'Uganda',
            'validationRules' => "/\d{9}$/",
        ],
    ];

    private const AVAILABLE_STATUS = [
        'OK',
        'NOK',
    ];

    public static function getInformation(string $phone): object
    {
        $information = new self();

        $countryCode = $information->getCountryCode($phone);
        $countryName = $information->getCoutryName($countryCode);

        $data = (object) [];
        $data->countryCode = sprintf('+%s', $countryCode);
        $data->countryName = $countryName;
        $data->state = $information->getState($phone, $countryCode);
        $data->phoneNumber = $information->getNumber($phone);

        return $data;
    }

    private function getCountryCode(string $phone): string
    {
        $splitNumber = explode(')', $phone);

        if (empty($splitNumber)) {
            return self::INVALID_CONTRY_CODE;
        }

        $cleanCountryCode = preg_replace("/[(]|[)]/", "", $splitNumber[0]);

        if (empty($cleanCountryCode) || strlen($cleanCountryCode) !== 3) {
            return self::INVALID_CONTRY_CODE;
        }
        return $cleanCountryCode;
    }

    private function getCoutryName(string $countryCode): string
    {
        if ($countryCode === self::INVALID_CONTRY_CODE) {
            return self::INVALID_COUNTRY_NAME;
        }

        if (array_key_exists($countryCode, self::COUNTRIES) === false) {
            return self::INVALID_COUNTRY_NAME;
        }

        return self::COUNTRIES[$countryCode]['countryName'];
    }

    private function getState(string $phone, string $countryCode): string
    {
        [$validPhone, $invalidPhone] = self::AVAILABLE_STATUS;

        if ($countryCode === self::INVALID_CONTRY_CODE) {
            return $invalidPhone;
        }

        $number = $this->getNumber($phone);

        $validationRule = self::COUNTRIES[$countryCode]['validationRules'];

        if (empty(preg_match($validationRule, $number))) {
            return $invalidPhone;
        }

        return $validPhone;
    }

    private function getNumber(string $phone): string
    {
        $splitNumber = explode(')', $phone);

        if ($splitNumber === false) {
            return $phone;
        }

        if (array_key_exists(1, $splitNumber) === false) {
            return trim($splitNumber[0]);
        }

        return trim($splitNumber[1]);
    }
}
