<?php

namespace App\Http\Controllers\Dashboard\CarModel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelRequest;
use App\Http\Utils\MessageUtil;
use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandController extends Controller
{
    public function store(ModelRequest $request)
    {

        $check = CarModel::query()
            ->where('name', $request->name)
            ->where('car_id', $request->car_id)
            ->exists();
        if ($check) {
            return to_route('dashboard.car-model.create')->with('fail', MessageUtil::MESSAGE_DUPLICATE);
        }

        CarModel::query()
            ->create([
                'name' => $request->name,
                'car_id' => $request->car_id,
                'created_by' => auth()->user()->id
            ]);
        return to_route('dashboard.car-model.create')->with('success', MessageUtil::MESSAGE_CREATED);
    }
    public function delete($id)
    {
        CarModel::query()
            ->where('id', $id)
            ->update([
                'deleted_at' => now()
            ]);
        return redirect()->back()->with('success', MessageUtil::MESSAGE_DELETED);
    }
    public function deleteBack($id)
    {
        CarModel::query()
            ->where('id', $id)
            ->update([
                'deleted_at' => null
            ]);
        return redirect()->back()->with('success', MessageUtil::MESSAGE_DELETE_CANCEL);
    }

    public function update(ModelRequest $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required|string|max:250|unique:cars.name,' . $id
        // ]);

        $check = CarModel::query()
            ->where('name', $request->name)
            ->where('car_id', $request->car_id)
            ->where('id', '!=', $id)
            ->first();

        if ($check) {
            return to_route('dashboard.car-model.edit', $id)->with('fail', MessageUtil::MESSAGE_DUPLICATE);
        }


        CarModel::query()
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'car_id' => $request->car_id,
            ]);
        return to_route('dashboard.car-model.edit', $id)->with('success', MessageUtil::MESSAGE_UPDATED);
    }
}
