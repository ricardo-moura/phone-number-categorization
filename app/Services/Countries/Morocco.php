<?php

namespace App\Services\Countries;

class Morocco
{
    public static function isValidNumber(string $phoneNumber): bool
    {
        $pattern = "/[5-9]\d{8}$/";
        return empty(preg_match($pattern, $phoneNumber)) ? false : true;
    }
}
