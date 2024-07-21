<?php

namespace App\Http\Controllers\Dashboard\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarStoreRequest;
use App\Models\Advertisement;
use App\Models\AdvertisementPhoto;
use App\SelectData\AdvertisementStatus;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::query()
            ->from('advertisements as a')
            ->select(
                'a.id',
                'su.name as creator',
                'c.name as car',
                'cm.name as model',
                'a.price',
                'a.status',
                'a.created_at',

            )
            ->join('site_users as su', 'su.id', 'a.created_by')
            ->join('cars as c', 'c.id', 'a.car_id')
            ->join('car_models as cm', 'cm.id', 'a.model_id')
            // ->orderByDesc('a.id')
            ->paginate(10);


        foreach ($advertisements as $advertisement) {
            $advertisement->status_label = AdvertisementStatus::getStatus($advertisement->status);
            $advertisement->status_color = AdvertisementStatus::getStatus($advertisement->status, 'color');
        }
        // return $advertisements;
        return view('dashboard.advertisement.index', compact('advertisements'));
    }

    public function show(Request $request, $id)
    {

        $advertisement = Advertisement::query()
            ->from('advertisements as a')
            ->select(
                'a.id',
                'a.body',
                'su.name as creator',
                'c.name as car',
                'cm.name as model',
                'a.price',
                'cr.name as currency',
                'a.created_at',
                'a.updated_at',
                'ft.name as fuel_type',
                'g.name as gear',
                'b.name as ban',
                'ai.year',
                'cl.name as color',
                'ai.distance',
                'ai.vin_code',
                'ct.name as city'
            )
            ->join('site_users as su', 'su.id', 'a.created_by')
            ->join('cars as c', 'c.id', 'a.car_id')
            ->join('car_models as cm', 'cm.id', 'a.model_id')
            ->join('currencies as cr', 'cr.id', 'a.currency_id')
            ->join('advertisement_infos as ai', 'ai.advertisement_id', 'a.id')
            ->join('fuel_types as ft', 'ft.id', 'ai.fuel_type_id')
            ->join('gears as g', 'g.id', 'ai.gear_id')
            ->join('bans as b', 'b.id', 'ai.ban_id')
            ->join('colors as cl', 'cl.id', 'ai.color_id')
            ->join('cities as ct', 'ct.id', 'ai.city_id')
            ->where('a.id', $id)
            ->with(['photos', 'suppliers'])
            ->first();

        // $photos = AdvertisementPhoto::query()
        //     ->where('advertisement_id', $advertisement->id)
        //     ->get();
        // $advertisement->photos = $photos;

        // return $advertisements;
        return view('dashboard.advertisement.show', compact('advertisement'));
    }
}
