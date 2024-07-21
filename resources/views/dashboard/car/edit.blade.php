@extends('dashboard.core.layout')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800"> Edit Cars </h1>
            <form action="{{route('dashboard.car.update', $car->id)}}" method="POST">

                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="name" value="{{$car->name}}" id="">
                </div>
                <button class="btn btn-sm btn-block btn-primary" type="submit"><b>UPDATE</b></button>
            </form>
    </div>

@endsection