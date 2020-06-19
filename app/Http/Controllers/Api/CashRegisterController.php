<?php

namespace App\Http\Controllers\Api;

use App\CashRegister;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOpenDayRequest;
use Dotenv\Validator;
use Illuminate\Http\Request;


class CashRegisterController extends Controller
{
    public function generateOpenResponse($resource = null, $status = 200, $message = 'Success') {
        if($resource == null) {
            return response()->json([
                'message' => $message,
                'data' => [
                    'type' => null,
                    'opening_date'=> null,
                    'opening_hour' => null,
                    'previous_closing_value' => null,
                    'opening_value' => null,
                    'description'=> null,
                ]
            ], $status);
        }

        return response()->json([
            'message' => $message,
            'data' => [
                'type' => 'cash_register',
                'opening_date'=> $resource->opening_date,
                'opening_hour' => $resource->opening_hour,
                'previous_closing_value' => $resource->previous_closing_value,
                'opening_value' => $resource->opening_value,
                'description'=> $resource->description,
            ]
        ], $status);
    }

    public function getOpenDay()
    {
        $lastRegister = CashRegister::latest()->first();
        return $this->generateOpenResponse($lastRegister);
    }


    public function storeOpenDay(StoreOpenDayRequest $request)
    {
        $openCash = CashRegister::create($request->all());
        $openCash->save();
         return $this->generateOpenResponse($openCash, 201, 'CashRegister was open with success');
    }

}
