<?php

namespace App\Http\Controllers\Dashboard\CarModel;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function create()
    {
        $cars = $this->getCarForSelect();

        return view('dashboard.car-model.create', compact('cars'));
    }

    public function index(Request $request)
    {
        $models = CarModel::query()
            ->from('car_models as cm')
            ->select(
                'cm.id',
                'cm.name',
                'c.name as car',
                'cm.created_at',
                'u.name as creator'
            )
            ->join('cars as c', 'c.id', 'cm.car_id')
            ->join('users as u', 'cm.created_by', 'u.id')
            ->whereNull('cm.deleted_at');


        if ($request->name != null) {
            $models = $models->where('c.name', 'like', "%$request->name%");
        }
        if ($request->car_model != null) {
            $models = $models->where('cm.name', 'like', "%$request->car_model%");
        }

        if ($request->creator != null) {
            $models = $models->where('u.name', 'like', "%$request->creator%");
        }

        $models = $models->paginate(10);


        // PHP de bu cur yazilir saat
        foreach ($models as $model) {
            $model->created_at_format = date('d.m.Y H:i', strtotime($model->created_at));
        }

        return view('dashboard.car-model.index', compact('models'));
    }
    public function trash(Request $request)
    {
        $models = CarModel::query()
            ->from('car_models as cm')
            ->select(
                'cm.id',
                'cm.name',
                'c.name as car_name',
                'u.name as creator',
                'cm.created_at',
                'cm.deleted_at',
            )
            ->join('cars as c', 'c.id', 'cm.car_id')
            ->join('users as u', 'u.id', 'cm.created_by')
            ->whereNotNull('cm.deleted_at')
            ->orderBy('name');


        if ($request->name != null) {
            $models = $models->where('c.name', 'like', "%$request->name%");
        }
        if ($request->car_model != null) {
            $models = $models->where('cm.name', 'like', "%$request->car_model%");
        }

        if ($request->creator != null) {
            $models = $models->where('u.name', 'like', "%$request->creator%");
        }

        $models = $models->paginate(10);

        // PHP de bu cur yazilir saat
        foreach ($models as $model) {
            $model->created_at_format = date('d.m.Y H:i', strtotime($model->created_at));
        }

        return view('dashboard.car-model.index-trash', compact('models'));
    }
    public function edit($id)
    {
        $model = CarModel::query()
            ->where('id', $id)
            ->first();

        if (!$model) {
            abort(404);
        }

        $cars = $this->getCarForSelect();

        return view('dashboard.car-model.edit', compact('model', 'cars'));
    }
    private function getCarForSelect()
    {
        return Car::query()
            ->select(
                'id',
                'name',
            )
            ->whereNull('deleted_at')
            ->orderBy('name')
            ->get();
    }
}
