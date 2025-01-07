<?php

namespace App\Http\Requests;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'brand' => 'required|string|max:255',
            'model' => 'string|max:255',
            'year' => 'integer|min:1900',
            'vin' => ['string', 'regex:/^[a-zA-Z0-9]{17}$/'],
            'number' => 'string|unique:cars|max:10',
            'class' => 'string|max:50',
            'power' => 'integer|min:0',
            'mileage' => 'integer|min:0',
            'insurance_status' => 'boolean',
            'service_interval' => 'integer|min:0',
            'client_id' => 'nullable|exists:users,id',
            'status' => ['string', Rule::in(array_values(Car::STATUS_NAMES))]
        ];
    }
}
