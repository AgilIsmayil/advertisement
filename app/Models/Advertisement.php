<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'created_by',
        'car_id',
        'model_id',
        'price',
        'currency_id',
        'status',
        'expired_at',
        'view',
    ];

    public function photos()
    {
        return $this->hasMany(AdvertisementPhoto::class, 'advertisement_id', 'id');
    }

    public function photo()
    {
        return $this->hasOne(AdvertisementPhoto::class, 'advertisement_id', 'id')

            ->orderBy('id');
    }

    public function suppliers()
    {
        return $this->hasMany(AdvertisementSupplier::class, 'advertisement_id', 'id')
            ->select(
                'advertisement_suppliers.*',
                'cs.name'
            )
            ->join('car_suppliers as cs', 'cs.id', 'advertisement_suppliers.supplier_id');
    }
}
