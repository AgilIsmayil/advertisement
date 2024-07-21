<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementSupplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'advertisement_id',
        'supplier_id',
    ];
}
