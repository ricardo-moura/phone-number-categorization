<?php

namespace App\Services\Countries;

class CountryInformation
{
    public const INVALID_CONTRY_CODE = 'Invalid country code';
    public const INVALID_COUNTRY_NAME = 'Invalid country name';

    public function getCountries(): array
    {
        return [
            '237' => 'Cameroon',
            '251' => 'Ethiopia',
            '212' => 'Morocco',
            '258' => 'Mozambique',
            '256' => 'Uganda',
        ];
    }

    public function getCountryCode(string $phone): string
    {
        $split = explode(')', $phone);

        if (empty($split)) {
            return self::INVALID_CONTRY_CODE;
        }

        $countryCode = preg_replace("/[(]|[)]/", "", $split[0]);

        if (empty($countryCode) || strlen($countryCode) !== 3) {
            return self::INVALID_CONTRY_CODE;
        }
        return $countryCode;
    }

    public function getCountryNameByCountryCode(string $countryCode): string
    {
        if ($countryCode === self::INVALID_CONTRY_CODE) {
            return self::INVALID_COUNTRY_NAME;
        }

        $countries = $this->getCountries();

        if (array_key_exists($countryCode, $countries) === false) {
            return self::INVALID_COUNTRY_NAME;
        }

        return $countries[$countryCode];
    }
}
