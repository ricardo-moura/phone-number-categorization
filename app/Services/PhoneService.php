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

        foreach($phones as $phone) {
            // $dt->country = "nigeria";
            // $dt->state = "ok";
            // $dt->countryCode = "ok";
            // $dt->phoneNumber = $dt->phone;
        }

        // return $data;
        // return $this->repository->getAll();
    }
}
