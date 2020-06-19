<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCloseDayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'closing_date' => 'required|date',
            'closing_hour' => 'required|date_format:H:i',
            'card_value' => 'required|integer',
            'cash_value' => 'required|integer',
            'closing_value' => 'required|integer',
            'sales_value' => 'required|integer',
            'expenses' => 'sometimes|array|filled',
            'expenses.*.name' => 'required',
            'expenses.*.value' => 'required|integer',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Opss! something is wrong with request body.',
            'errors' => $validator->errors()
        ], 400));
    }
}
