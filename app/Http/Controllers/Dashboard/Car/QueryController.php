<?php

namespace App\Http\Controllers\Dashboard\Car;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function create()
    {

        return view('dashboard.car.create');
    }

    public function index(Request $request)
    {
        $cars = Car::query()
            ->from('cars as c')
            ->select(
                'c.id',
                'c.name',
                'u.name as creator',
                'c.created_at',
            )
            ->join('users as u', 'u.id', 'c.created_by')
            ->whereNull('deleted_at')
            ->orderBy('name');


        if ($request->name != null) {
            $cars = $cars->where('c.name', 'like', "%$request->name%");
        }

        if ($request->creator != null) {
            $cars = $cars->where('u.name', 'like', "%$request->creator%");
        }

        $cars = $cars->paginate(10);

        // PHP de bu cur yazilir saat
        foreach ($cars as $car) {
            $car->created_at_format = date('d.m.Y H:i', strtotime($car->created_at));
        }

        return view('dashboard.car.index', compact('cars'));
    }
    public function trash(Request $request)
    {
        $cars = Car::query()
            ->from('cars as c')
            ->select(
                'c.id',
                'c.name',
                'u.name as creator',
                'c.created_at',
                'c.deleted_at',
            )
            ->join('users as u', 'u.id', 'c.created_by')
            ->whereNotNull('deleted_at')
            ->orderBy('name');


        if ($request->name != null) {
            $cars = $cars->where('c.name', 'like', "%$request->name%");
        }

        if ($request->creator != null) {
            $cars = $cars->where('u.name', 'like', "%$request->creator%");
        }

        $cars = $cars->paginate(10);

        // PHP de bu cur yazilir saat
        foreach ($cars as $car) {
            $car->created_at_format = date('d.m.Y H:i', strtotime($car->created_at));
        }

        return view('dashboard.car.index-trash', compact('cars'));
    }
    public function edit($id)
    {
        $car = Car::query()
            ->where('id', $id)
            ->first();
        if (!$car) {
            abort(404);
        }
        return view('dashboard.car.edit', compact('car'));
    }
}
