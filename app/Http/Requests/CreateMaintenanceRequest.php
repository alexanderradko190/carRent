<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMaintenanceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'car_id' => 'required|exists:cars,id',
            'date' => 'required|date',
            'description' => 'required|string|max:1000',
            'cost' => 'required|numeric|min:0',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ];
    }
}
