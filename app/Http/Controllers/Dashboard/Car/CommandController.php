<?php

namespace App\Http\Controllers\Dashboard\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelRequest;
use App\Http\Utils\MessageUtil;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CommandController extends Controller
{
    public function store(ModelRequest $request)
    {

        $check = Car::query()
            ->where(DB::raw('UPPER(name)'), strtoupper($request->name))
            ->exists();

        if ($check) {
            return to_route('dashboard.car.create')->with('fail', MessageUtil::MESSAGE_DUPLICATE);
        }
        Car::query()
            ->create([
                'name' => $request->name,
                'created_by' => auth()->user()->id,
            ]);

        Cache::forget('car_select');

        return to_route('dashboard.car.create')->with('success', MessageUtil::MESSAGE_CREATED);
    }
    public function delete($id)
    {
        Car::query()
            ->where('id', $id)
            ->update([
                'deleted_at' => now()
            ]);
        Cache::forget('car_select');

        return redirect()->back()->with('success', MessageUtil::MESSAGE_DELETED);
    }
    public function deleteBack($id)
    {
        Car::query()
            ->where('id', $id)
            ->update([
                'deleted_at' => null
            ]);
        Cache::forget('car_select');

        return redirect()->back()->with('success', MessageUtil::MESSAGE_DELETE_CANCEL);
    }

    public function update(ModelRequest $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required|string|max:250|unique:cars.name,' . $id
        // ]);

        $check = Car::query()
            ->where('name', $request->name)
            ->where('id', '!=', $id)
            ->exists();
        if ($check) {
            return to_route('dashboard.car.edit', $id)->with('fail', MessageUtil::MESSAGE_DUPLICATE);
        }


        Car::query()
            ->where('id', $id)
            ->update([
                'name' => $request->name
            ]);
        Cache::forget('car_select');

        return to_route('dashboard.car.edit', $id)->with('success', MessageUtil::MESSAGE_UPDATED);
    }
}