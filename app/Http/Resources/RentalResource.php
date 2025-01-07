<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentalResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'car' => new CarResource($this->whenLoaded('car')),
            'user' => new UserResource($this->whenLoaded('user')),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'total_cost' => $this->total_cost,
            'insurance' => $this->insurance
        ];
    }
}

