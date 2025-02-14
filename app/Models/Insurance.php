<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'policy_number', 'service_name', 'validity', 'cost'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

