<?php

namespace App\Services;

use App\Repositories\CustomerRepository as Repository;

class PhoneService
{
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        $phones = $this->repository->getAll();

        foreach ($phones as $phone) {
            $auxiliaryData = PhoneInformation::getInformation($phone->phone);
            $phone->countryName = $auxiliaryData->countryName;
            $phone->state = $auxiliaryData->state;
            $phone->countryCode = $auxiliaryData->countryCode;
            $phone->phoneNumber = $auxiliaryData->phoneNumber;
            unset($phone->phone);
        }

        return $phones;
    }
}
