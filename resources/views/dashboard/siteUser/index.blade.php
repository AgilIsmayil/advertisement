@extends('dashboard.core.layout')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10">
                 <h1 class="h3 mb-2 text-gray-800"> Site Registered Users </h1>
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
        <th>Email</th>
        <th>Phone</th>
        <th>Email verified at</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{$loop->index + 1}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{ date('d.m.Y H:i', strtotime($user->email_verified_at))}}</td>

        <td>{{date('d.m.Y H:i', strtotime($user->created_at_format))}}</td>
        

      </tr>
    @endforeach
     
    </tbody>
  </table>
         {{$users->links()}}
    </div>

@endsection