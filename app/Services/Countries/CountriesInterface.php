<?php

namespace App\Services\Countries;

interface CountriesInterface
{
    public static function isValidNumber(string $phoneNumber): bool;
}
