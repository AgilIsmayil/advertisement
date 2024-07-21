<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementPhoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'advertisement_id',
        'photo',
    ];
}