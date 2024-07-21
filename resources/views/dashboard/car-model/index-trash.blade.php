@extends('dashboard.core.layout')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10">
                 <h1 class="h3 mb-2 text-gray-800"> Deleted Car's Model </h1>
            </div>

             <div class="col-md-2">
                <div class="row">
                    <div class="col-md-4">
                         <a href="{{route('dashboard.car-model.index')}}" class="btn btn-sm btn-secondary">Trash</a>
                    </div>
                     {{-- <div class="col-md-4">
                         <a href="{{route('dashboard.car.create')}}" class="btn btn-sm btn-info">Create</a>
                     </div> --}}
                </div>

            </div>

           
        </div>


        <form action="" method="GET">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" value="{{request()->get('name')}}" class="form-control" name="name" id="name">
                </div>
              </div>

               <div class="col-md-3">
                <div class="form-group">
                      <label for="creator">Creator</label>
                      <input type="text"  value="{{request()->get('creator')}}" class="form-control" name="creator" id="creator">
                </div>
              </div>

              <div class="col-md-3">
               <div style="visibility: hidden">a</div>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-magnifying-glass"></i>
                </button>
              </div>
            </div>


        </form>

        <table class="table">
    <thead>
      <tr>
        <th># {{request()->segment(2)}}</th>
        <th>Name</th>
        <th>Created By</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($models as $model)
      <tr>
        <td>{{$loop->index + 1}}</td>
        <td>{{$model->name}}</td>
        <td>{{$model->car}}</td>
        <td>{{$model->creator ?? '' }}</td>
        <td>{{$model->deleted_at}}</td>
        <td>{{$model->created_at_format}}</td>
        <td>
            <a class="btn btn-sm btn-warning" href="{{route('dashboard.car-model.delete.back', $model->id)}}">
                <i class="fa-solid fa-rotate-left"></i>
            </a>
        </td>
         {{-- <td>
            <a class="btn btn-sm btn-danger" href="{{route('dashboard.car.delete', $car->id)}}">
                <i class="fa fa-trash" ></i>
            </a>
        </td> --}}

      </tr>
    @endforeach
     
    </tbody>
  </table>
         {{$models->links()}}
    </div>

@endsection