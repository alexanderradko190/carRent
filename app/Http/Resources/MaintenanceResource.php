<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MaintenanceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'car' => new CarResource($this->whenLoaded('car')),
            'date' => $this->date,
            'description' => $this->description,
            'cost' => $this->cost,
            'document' => $this->document
        ];
    }
}
