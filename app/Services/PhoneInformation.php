<?php

namespace App\Services;

class PhoneInformation
{
    public static function getCountry(string $phoneNumber)
    {
        $countryCodes = [
            '237' => 'Cameroon',
            '251' => 'Ethiopia',
            '212' => 'Morocco',
            '258' => 'Mozambique',
            '256' => 'Uganda',
        ];
        foreach ($countryCodes as $code => $countryName) {
            $pattern = "/\(". $code ."\)/";
            if (preg_match($pattern, $phoneNumber) === 1) {
                return $countryName;
            }
        }
    }

    // public function getState(string $phoneNumber);

    // public function getCountryCode(string $phoneNumber);

    // public function getNumber(string $phoneNumber);
}
