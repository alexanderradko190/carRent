<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'car' => new CarResource($this->whenLoaded('car')),
            'policy_number' => $this->policy_number,
            'service_name' => $this->service_name,
            'validity' => $this->validity,
            'cost' => $this->cost
        ];
    }
}
