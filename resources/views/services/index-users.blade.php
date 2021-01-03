@extends('layouts.mainlayout')
@section('content')
    <div class="">
        <div class="row mx-auto my-2">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Our Services</h2>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <div class="row">
            @foreach ($services as $service)
                @if($service->availability == 1)
                    <div class="mx-3 col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <img src="http://via.placeholder.com/400" class="rounded" alt="service photo">
                        <p class="lead">{{ $service->name }}</p>
                        <p>Price: {{ $service->price }} €</p>
                        <br>
                        <br>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {!! $services->links() !!}
        </div>
    </div>
@endsection
