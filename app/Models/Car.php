<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    public const STATUS_ACTIVE = 1;
    public const STATUS_WAITING = 2;
    public const STATUS_SERVICE = 3;

    public const STATUS_NAMES = [
        self::STATUS_ACTIVE => 'Арендован',
        self::STATUS_WAITING => 'Ожидает',
        self::STATUS_SERVICE => 'На обслуживании'
    ];

    protected $fillable = [
        'brand', 'model', 'year', 'vin', 'number', 'class', 'power', 'mileage',
        'insurance_status', 'service_interval',
        'client_id', 'status'
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function insurances()
    {
        return $this->hasMany(Insurance::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}

