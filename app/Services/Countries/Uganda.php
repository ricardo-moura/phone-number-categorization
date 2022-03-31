<?php

namespace App\Services\Countries;

class Uganda implements CountriesInterface
{
    public static function isValidNumber(string $phoneNumber): bool
    {
        $pattern = "/\d{9}$/";
        return empty(preg_match($pattern, $phoneNumber)) ? false : true;
    }
}
