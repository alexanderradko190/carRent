<?php

namespace App\Http\Requests;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'number' => 'string|unique:cars|max:10',
            'power' => 'integer|min:0',
            'mileage' => 'integer|min:0',
            'insurance_status' => 'boolean',
            'service_interval' => 'integer|min:0',
            'client_id' => 'nullable|exists:users,id',
            'status' => ['string', Rule::in(array_values(Car::STATUS_NAMES))]
        ];
    }
}
