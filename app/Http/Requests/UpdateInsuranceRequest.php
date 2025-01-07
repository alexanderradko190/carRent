<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInsuranceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'service_name' => 'required|string|max:255',
            'validity' => 'required|date',
            'cost' => 'required|numeric|min:0',
        ];
    }
}
