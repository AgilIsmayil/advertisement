<?php

namespace App\SelectData;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\FuelType;
use Illuminate\Support\Facades\Cache;

class AdvertisementSelect
{
    public static function car()
    {
        return Cache::remember('car_select', 3600 * 24, function () {
            return
                Car::query()
                ->select(
                    'id',
                    'name',
                )
                ->whereNull('deleted_at')
                ->get();
        });
    }
    public static function fuel()
    {
        return Cache::remember('fuel_select', 3600 * 24, function () {
            return
                FuelType::query()
                ->select(
                    'id',
                    'name',
                )
                ->get();
        });
    }
    public static function models()
    {
        $models = CarModel::query()
            ->select('id', 'name')
            ->where('id', request()->car_id)
            ->whereNull('deleted_at')
            ->get();
    }
}
