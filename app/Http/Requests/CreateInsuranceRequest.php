<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInsuranceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'car_id' => 'required|exists:cars,id',
            'policy_number' => 'required|string|max:255|unique:insurances',
            'service_name' => 'required|string|max:255',
            'validity' => 'required|date',
            'cost' => 'required|numeric|min:0',
        ];
    }
}
