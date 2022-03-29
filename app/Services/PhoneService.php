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

        // return $phones;

        // echo '<pre>';
        foreach($phones as $phone) {
            $auxiliaryData = PhoneInformation::getInformation($phone->phone);
            $phone->countryName = $auxiliaryData->countryName;
            $phone->state = $auxiliaryData->state;
            $phone->countryCode = $auxiliaryData->countryCode;
            unset($phone->phone);
            // unset();
            // dd($phone);
            // $phone->country = PhoneInformation::getCountry($phone->phone);
            // echo $phone->phone ."\n";
            // $dt->country = "nigeria";
            // $dt->state = "ok";
            // $dt->countryCode = "ok";
            // $dt->phoneNumber = $dt->phone;
        }

        return $phones;
    }
}
