<?php

namespace App\Http\Controllers;

use App\Services\PhoneService;
use Illuminate\Http\Request;
use Exception;


class PhoneController extends Controller
{
    protected $phoneService;

    public function __construct(PhoneService $phoneService)
    {
        $this->phoneService = $phoneService;
    }

    public function list(Request $request)
    {
        try {
            $result = ['status' => 200];
            $result['data'] = $this->phoneService->getAll($request);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return $result;
    }
}
