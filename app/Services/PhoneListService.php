<?php

namespace App\Services;

use App\Repositories\CustomerRepository as Repository;
use Illuminate\Http\Request;

class PhoneListService
{
    private $repository;

    public function __construct(
        Repository $repository,
        Phone $phone,
    )
    {
        $this->repository = $repository;
        $this->phone = $phone;
    }

    public function listAll(Request $request)
    {
        $customersCollection = $this->repository->getAll();

        foreach ($customersCollection as $customer) {
            $customerPhoneNumber = $customer->phone;
            $countryCode = $this->phone->getCountryCode($customerPhoneNumber);
            $countryName = $this->phone->getCountryName($countryCode);

            $state = $this->phone->getState(
                $customerPhoneNumber,
                $countryCode,
                $countryName
            );
            $phoneNumber = $this->phone->getNumber($customerPhoneNumber);

            $customer->countryName = $countryName;
            $customer->state = $state;
            $customer->countryCode = $countryCode;
            $customer->phoneNumber = $phoneNumber;
            unset($customer->phone);
        }

        $country = $request->query('country');
        $state = $request->query('state');

        if (empty($country) && empty($state)) {
            return $customersCollection;
        }

        if (!empty($country) && !empty($state)) {
            $newPhoneCollection = $customersCollection->filter(function ($value, $key) use ($country) {
                return $value->countryName === $country;
            });
            $newPhoneCollection = $newPhoneCollection->filter(function ($value, $key) use ($state) {
                return $value->state === $state;
            });
            return $newPhoneCollection;
        }

        if (!empty($country)) {
            $newPhoneCollection = $customersCollection->filter(function ($value, $key) use ($country) {
                return $value->countryName === $country;
            });
            return $newPhoneCollection;
        }
        if (!empty($state)) {
            $newPhoneCollection = $customersCollection->filter(function ($value, $key) use ($state) {
                return $value->state === $state;
            });
            return $newPhoneCollection;
        }
    }
}
