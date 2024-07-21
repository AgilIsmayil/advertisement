<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'advertisement_id',
        'fuel_type_id',
        'gear_id',
        'ban_id',
        'year',
        'color_id',
        'distance',
        'vin_code',
        'city_id',
    ];
}
