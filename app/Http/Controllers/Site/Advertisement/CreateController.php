<?php

namespace App\Http\Controllers\Site\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarStoreRequest;
use App\Models\Advertisement;
use App\Models\AdvertisementInfo;
use App\Models\AdvertisementSupplier;
use App\Models\Ban;
use App\Models\Car;
use App\Models\CarSupplier;
use App\Models\City;
use App\Models\Color;
use App\Models\Currency;
use App\Models\FuelType;
use App\Models\Gear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CreateController extends Controller
{
    public function create()
    {


        $cars = Cache::remember('car_select', 3600 * 24, function () {
            return
                Car::query()
                ->select(
                    'id',
                    'name',
                )
                ->whereNull('deleted_at')
                ->get();
        });

        $fuels = Cache::remember('fuel_select', 3600 * 24, function () {
            return
                FuelType::query()
                ->select(
                    'id',
                    'name',
                )
                ->get();
        });

        $gears = Cache::remember('gear_select', 3600 * 24, function () {
            return
                Gear::query()
                ->select(
                    'id',
                    'name',
                )
                ->get();
        });

        $bans = Cache::remember('ban_select', 3600 * 24, function () {
            return
                Ban::query()
                ->select(
                    'id',
                    'name',
                )
                ->get();
        });


        $currencies = Cache::remember('currencies_select', 3600 * 24, function () {
            return
                Currency::query()
                ->select(
                    'id',
                    'name',
                )
                ->get();
        });

        $colors = Cache::remember('colors_select', 3600 * 24, function () {
            return
                Color::query()
                ->select(
                    'id',
                    'name',
                )
                ->get();
        });
        $cities = Cache::remember('cities_select', 3600 * 24, function () {
            return
                City::query()
                ->select(
                    'id',
                    'name',
                )
                ->get();
        });
        $suppliers = Cache::remember('suppliers_select', 3600 * 24, function () {
            return
                CarSupplier::query()
                ->select(
                    'id',
                    'name',
                )
                ->get();
        });

        return view(
            'site.create',
            compact(
                'cars',
                'fuels',
                'gears',
                'bans',
                'currencies',
                'colors',
                'cities',
                'suppliers',
            )
        );
    }
}
