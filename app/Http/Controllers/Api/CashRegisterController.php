<?php

namespace App\Http\Controllers\Api;

use App\CashRegister;
use App\Http\Controllers\Controller;


class CashRegisterController extends Controller
{
    public function getOpenDay()
    {
        $lastRegister = CashRegister::latest()->first();

        return $this->generateOpenResponse($lastRegister);

    }

    public function generateOpenResponse($resource) {
        if($resource == null) {
            return response()->json([
                'data' => [
                    'opening_date'=> null,
                    'opening_hour' => null,
                    'previous_closing_value' => null,
                    'opening_value' => null,
                    'description'=> null,
                ]
            ]);
        }

        return response()->json([
            'data' => [
                'opening_date'=> $resource->opening_date,
                'opening_hour' => $resource->opening_hour,
                'previous_closing_value' => $resource->previous_closing_value,
                'opening_value' => $resource->opening_value,
                'description'=> $resource->description,
            ]
        ]);
    }

}
