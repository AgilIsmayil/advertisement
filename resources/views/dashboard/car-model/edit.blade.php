@extends('dashboard.core.layout')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800"> Edit Car's Model </h1>
            <form action="{{route('dashboard.car-model.update', $model->id)}}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="car_id">Car</label>
                    <select name="car_id" id="car_id" class="form-control">
                        @foreach($cars as $car)
                        <option value="{{$car->id}}" @if($car->id == $model->car_id) selected @endif>{{$car->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="name" value="{{$model->name}}" id="">
                </div>
                <button class="btn btn-sm btn-block btn-primary" type="submit"><b>UPDATE</b></button>
            </form>
    </div>

@endsection