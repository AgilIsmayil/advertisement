@extends('dashboard.core.layout')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10">
                 <h1 class="h3 mb-2 text-gray-800"> Cars </h1>
            </div>

             <div class="col-md-2">
                <div class="row">
                    <div class="col-md-4">
                         <a href="{{route('dashboard.car.index.trash')}}" class="btn btn-sm btn-warning">Trash</a>
                    </div>
                     <div class="col-md-4">
                         <a href="{{route('dashboard.car.create')}}" class="btn btn-sm btn-info">Create</a>
                     </div>
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
                <a href="{{route('dashboard.car.index')}}" class="btn btn-warning">
                <i class="fa fa-rotate"></i>
                </a>
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
    @foreach($cars as $car)
      <tr>
        <td>{{$loop->index + 1}}</td>
        <td>{{$car->name}}</td>
        <td>{{$car->creator ?? '' }}</td>
        <td>{{$car->created_at_format}}</td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{route('dashboard.car.edit', $car->id)}}">
                <i class="fa fa-pen" ></i>
            </a>
        </td>
         <td>
            <a class="btn btn-sm btn-danger" href="{{route('dashboard.car.delete', $car->id)}}">
                <i class="fa fa-trash" ></i>
            </a>
        </td>

      </tr>
    @endforeach
     
    </tbody>
  </table>
         {{$cars->links()}}
    </div>

@endsection