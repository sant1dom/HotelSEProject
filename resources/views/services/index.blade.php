@extends('layouts.mainlayout')
@section('content')
    <div class="">
        <div class="row mx-auto my-2">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Lista dei servizi</h2>
                </div>

                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('services.create') }}"> Create New Service</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered mx-2">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Availability</th>
                <th width="280px">Action</th>
            </tr>

            @foreach ($services as $service)

                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->price }}</td>
                    @if($service->availability == 1)
                        <td>{{__('Available')}}</td>
                    @else
                        <td>{{__('Not available')}}</td>
                    @endif
                        <td>

                        <form action="{{ route('services.destroy',$service->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {!! $services->links() !!}
        </div>
    </div>
@endsection
