<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhoneController extends Controller
{
    public function list()
    {
        $users = DB::select('select * from customer');

        return ['users' => $users];
    }
}
