<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    private $model;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->select('id','phone')->get();
    }
}
