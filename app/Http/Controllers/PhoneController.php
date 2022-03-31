<?php

namespace App\Http\Controllers;

use App\Services\PhoneListService;
use Exception;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    protected $phoneListService;

    public function __construct(PhoneListService $phoneListService)
    {
        $this->phoneListService = $phoneListService;
    }

    public function list(Request $request)
    {
        try {
            $result = ['status' => 200];
            $result['data'] = $this->phoneListService->listAll($request);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return $result;
    }
}
