<?php

namespace App\Services\Countries;

class Cameroon
{
    public static function isValidNumber(string $phoneNumber): bool
    {
        $pattern = "/[2368]\d{7,8}/";
        return empty(preg_match($pattern, $phoneNumber)) ? false : true;
    }
}
