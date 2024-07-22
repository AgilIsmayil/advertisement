<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementView extends Model
{
    use HasFactory;

    protected $fillable = [
        'advertisement_id',
        'ip',
        'user_agent',
    ];
}
