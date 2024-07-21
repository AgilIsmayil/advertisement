@extends('dashboard.core.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10">
                <h1 class="h3 mb-2 text-gray-800"> Advertisement </h1>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Ətraflı
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">About: {{ $advertisement->body }}</li>
                <li class="list-group-item">Applier: {{ $advertisement->creator }}</li>
                <li class="list-group-item">Car: {{ $advertisement->car }}</li>
                <li class="list-group-item">Model: {{ $advertisement->model }}</li>
                <li class="list-group-item">Price: {{ $advertisement->price }}</li>
                <li class="list-group-item">Currency: {{ $advertisement->currency }}</li>
                <li class="list-group-item">Created at: {{ $advertisement->created_at }}</li>
                <li class="list-group-item">Fuel type: {{ $advertisement->fuel_type }}</li>
                <li class="list-group-item">Gear: {{ $advertisement->gear }}</li>
                <li class="list-group-item">Year: {{ $advertisement->year }}</li>
                <li class="list-group-item">Color: {{ $advertisement->color }}</li>
                <li class="list-group-item">Distance: {{ $advertisement->distance }}</li>
                <li class="list-group-item">Vin code: {{ $advertisement->vin_code }}</li>
                <li class="list-group-item">City: {{ $advertisement->city }}</li>
                <li class="list-group-item">
                    Suppliers:
                    @foreach ($advertisement->suppliers as $supplier)
                        {{ $supplier->name }}
                        @if ($loop->iteration != count($advertisement->suppliers))
                            ,
                        @endif
                    @endforeach

                </li>
                <li class="list-group-item">
                    @foreach ($advertisement->photos as $photo)
                       <img src="{{$photo->photo}}" width="200px" alt="">
                    @endforeach

                </li>



            </ul>
        </div>

    </div>
@endsection
