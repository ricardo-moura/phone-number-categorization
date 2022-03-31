<?php

namespace App\Services\Countries;

class Ethiopia implements CountriesInterface
{
    public static function isValidNumber(string $phoneNumber): bool
    {
        $pattern = "/[1-59]\d{8}$/";
        return empty(preg_match($pattern, $phoneNumber)) ? false : true;
    }
}
