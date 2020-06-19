<?php

namespace App\Http\Controllers\Api;

use App\CashRegister;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCloseDayRequest;
use App\Http\Requests\StoreOpenDayRequest;


class CashRegisterController extends Controller
{
    protected function generateCustomResponse($message = 'success', $data = [], $status = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ]);
    }

    protected function generateOpenResponse($resource = null, $status = 200, $message = 'Success') {
        $data =  [
            'type' => 'cash_register',
            'opening_date'=> null,
            'opening_hour' => null,
            'previous_closing_value' => null,
            'opening_value' => null,
            'description'=> null,
        ];

        if($resource != null && $resource->closing_date == null) {
            $data = [
                'type' => 'cash_register',
                'opening_date'=> $resource->opening_date,
                'opening_hour' => $resource->opening_hour,
                'previous_closing_value' => $resource->previous_closing_value,
                'opening_value' => $resource->opening_value,
                'description'=> $resource->description,
            ];
        }

        return $this->generateCustomResponse($message, $data, $status);

    }

    public function getOpenCashRegister()
    {
        $lastRegister = CashRegister::latest()->first();
        return $this->generateOpenResponse($lastRegister);
    }

    public function storeOpenCashRegister(StoreOpenDayRequest $request)
    {
        $openCash = CashRegister::create($request->all());
        $openCash->save();
        return $this->generateOpenResponse($openCash, 201, 'Cash register was open with success');
    }

    public function storeCloseCashRegister(StoreCloseDayRequest $request)
    {
        $lastRegister = CashRegister::latest()->first();
        $lastRegister->update($request->all());
        $lastRegister->save();

        return $this->generateCustomResponse('Cash register was closed with success');
    }

    public function getCloseCashRegister()
    {
        $lastRegister = CashRegister::latest()->first();
        if($lastRegister == null || $lastRegister->closing_date == null) {
           return $this->generateCustomResponse('No se puede mostrar esta información');
        }
        return $this->generateCustomResponse('Success', [
            'type' => 'cash_register',
            'closing_value'=> $lastRegister->closing_value,
            'card_value' => $lastRegister->card_value,
            'value' => $lastRegister->closing_value - $lastRegister->card_value
        ]);
    }

}
