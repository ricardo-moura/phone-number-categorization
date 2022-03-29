<?php

namespace App\Services;

class PhoneInformation
{
    private const INVALID_CONTRY_CODE = 'Invalid country code';

    private const INVALID_CONTRY_NAME = 'Invalid country name';

    private const COUNTRIES_NAME = [
        '237' => 'Cameroon',
        '251' => 'Ethiopia',
        '212' => 'Morocco',
        '258' => 'Mozambique',
        '256' => 'Uganda',
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
        $state = $information->getState($phone, $countryCode);
        // $phoneWithoutCountryCode = $information->getPhoneWithoutCountryCode(
        //     $phone,
        //     $countryName
        // );

        $data = (object) [];
        $data->countryCode = sprintf('+%s', $countryCode);
        $data->countryName = $countryName;
        $data->state = $state;

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
            return self::INVALID_CONTRY_NAME;
        }

        if (array_key_exists($countryCode, self::COUNTRIES_NAME) === false) {
            return self::INVALID_CONTRY_NAME;
        }

        return self::COUNTRIES_NAME[$countryCode];
    }

    private function getState(string $phone, string $countryCode): string
    {
        [$validPhone, $invalidPhone] = self::AVAILABLE_STATUS;

        if ($countryCode === self::INVALID_CONTRY_CODE) {
            return $invalidPhone;
        }

        $number = $this->getNumber($phone);
        dd($number);

        // $splitNumber = false;
        // dd(count($splitNumber));

        return $validPhone;
    }

    private function getNumber(string $phone): string
    {
        $splitNumber = explode(')', $phone);

        if ($splitNumber === false) {
            return $phone;
        }

        if (array_key_exists(1, $splitNumber) === false) {
            return $splitNumber[0];
        }
        return $splitNumber[1];
    }
}
