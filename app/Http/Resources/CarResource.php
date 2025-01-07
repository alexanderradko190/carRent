<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year,
            'vin' => $this->vin,
            'number' => $this->number,
            'class' => $this->class,
            'power' => $this->power,
            'mileage' => $this->mileage,
            'insurance_status' => $this->insurance_status,
            'service_interval' => $this->service_interval,
            'client' => new UserResource($this->whenLoaded('client')),
            'status' => $this->status
        ];
    }
}

