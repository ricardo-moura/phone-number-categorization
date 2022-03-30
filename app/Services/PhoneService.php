<?php

namespace App\Services;

use App\Repositories\CustomerRepository as Repository;
use Illuminate\Http\Request;

class PhoneService
{
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(Request $request)
    {
        $phoneCollection = $this->repository->getAll();

        foreach ($phoneCollection as $phone) {
            $auxiliaryData = PhoneInformation::getInformation($phone->phone);
            $phone->countryName = $auxiliaryData->countryName;
            $phone->state = $auxiliaryData->state;
            $phone->countryCode = $auxiliaryData->countryCode;
            $phone->phoneNumber = $auxiliaryData->phoneNumber;
            unset($phone->phone);
        }

        $country = $request->query('country');
        $state = $request->query('state');

        if (empty($country) && empty($state)) {
            return $phoneCollection;
        }

        if (!empty($country) && !empty($state)) {
            $newPhoneCollection = $phoneCollection->filter(function ($value, $key) use ($country) {
                return $value->countryName === $country;
            });
            $newPhoneCollection = $newPhoneCollection->filter(function ($value, $key) use ($state) {
                return $value->state === $state;
            });
            return $newPhoneCollection;
        }

        if (!empty($country)) {
            $newPhoneCollection = $phoneCollection->filter(function ($value, $key) use ($country) {
                return $value->countryName === $country;
            });
            return $newPhoneCollection;
        }
        if (!empty($state)) {
            $newPhoneCollection = $phoneCollection->filter(function ($value, $key) use ($state) {
                return $value->state === $state;
            });
            return $newPhoneCollection;
        }
    }
}
