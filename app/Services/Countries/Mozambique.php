<?php

namespace App\Services\Countries;

class Mozambique implements CountriesInterface
{
    public static function isValidNumber(string $phoneNumber): bool
    {
        $pattern = "/[28]\d{7,8}$/";
        return empty(preg_match($pattern, $phoneNumber)) ? false : true;
    }
}
