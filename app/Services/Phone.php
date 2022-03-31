<?php

namespace App\Services;

use App\Services\Countries\CountryInformation;

class Phone
{
    private $countryInformation;

    private const AVAILABLE_STATUS = [
        'OK',
        'NOK',
    ];

    public function __construct(CountryInformation $countryInformation)
    {
        $this->countryInformation = $countryInformation;
    }

    public function getCountryCode(string $phone): string
    {
        return $this->countryInformation->getCountryCode($phone);
    }

    public function getCountryName(string $countryCode): string
    {
        return $this->countryInformation->getCountryNameByCountryCode($countryCode);
    }

    public function getNumber(string $phone): string
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

    public function getState(string $phone, string $countryCode, string $countryName): string
    {
        [$validPhone, $invalidPhone] = self::AVAILABLE_STATUS;

        $countries = $this->countryInformation;

        if ($countryCode === $countries::INVALID_CONTRY_CODE || $countryName === $countries::INVALID_COUNTRY_NAME) {
            return $invalidPhone;
        }

        $phoneWithoutCountryCode = $this->getNumber($phone);

        $validatorFqn = sprintf('App\Services\Countries\%s', $countryName);

        if (class_exists($validatorFqn) === false) {
            return $invalidPhone;
        }

        if ($validatorFqn::isValidNumber($phoneWithoutCountryCode) === true) {
            return $validPhone;
        }

        return $invalidPhone;
    }
}
