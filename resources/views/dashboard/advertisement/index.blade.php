@extends('dashboard.core.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10">
                <h1 class="h3 mb-2 text-gray-800"> Advertisements </h1>
            </div>


        </div>


        <form action="" method="GET">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{ request()->get('name') }}" class="form-control" name="name"
                            id="name">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="creator">Creator</label>
                        <input type="text" value="{{ request()->get('creator') }}" class="form-control" name="creator"
                            id="creator">
                    </div>
                </div>

                <div class="col-md-3">
                    <div style="visibility: hidden">a</div>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-magnifying-glass"></i>
                    </button>
                    <a href="{{ route('dashboard.car.index') }}" class="btn btn-warning">
                        <i class="fa fa-rotate"></i>
                    </a>
                </div>
            </div>


        </form>

        <table class="table">
            <thead>
                <tr>
                    <th># {{ request()->segment(2) }}</th>
                    <th>Applier</th>
                    <th>Car</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($advertisements as $advertisement)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $advertisement->creator }}</td>
                        <td>{{ $advertisement->car }}</td>
                        <td>{{ $advertisement->model }}</td>
                        <td>{{ $advertisement->price }}</td>
                        <td>{{ date('d.m.Y H:i', strtotime($advertisement->created_at_format)) }}</td>
                        <td>
                            <span class="fs20 badge badge-{{ $advertisement->status_color }}">
                               <h6 class="mb-0 px-2 py-1"> {{ $advertisement->status_label }}</h6>
                            </span>

                        </td>
                        <td>
                            <a href="{{ route('dashboard.advertisement.show', $advertisement->id) }}"
                                class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                            @if ($advertisement->status == 1)
                                <a href="{{ route('dashboard.advertisement.approve', $advertisement->id) }}"
                                    class="btn btn-sm btn-success">
                                    <i class="fa fa-check"></i>
                                </a>
                                <a href="{{ route('dashboard.advertisement.reject', $advertisement->id) }}"
                                    class="btn btn-sm btn-danger">
                                    <i class="fa fa-x"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $advertisements->links() }}
    </div>
@endsection
