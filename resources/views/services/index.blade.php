@extends('layouts.admin-layout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <h4 class="title has-text-centered text-light font-weight-bold" style="font-size:3vw;">
                Services management
            </h4>
        </div>
    </section>
    <section class="hero is-bold">
        <div class="hero-body" style="height: 800px">
            <div class="container dashboard">
                <div class="card hoverCard bg-warning">
                    <div class="card-body">
                        {{-- Yellow background--}}
                    </div>
                </div>
                <div class="card dashboard">
                    <h5 class="card-header d-flex justify-content-center">
                        {{ $services->links( "pagination::bootstrap-4" ) }}
                    </h5>
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-fixed table-striped header-fixed">
                            <thead style="position: sticky; top: 0" class="thead-dark">
                            <tr>
                                <th class="header has-text-centered" scope="col">Name</th>
                                <th class="header has-text-centered" scope="col">Price</th>
                                <th class="header has-text-centered" scope="col">Availability</th>
                                <th class="header has-text-centered" scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{$service->name}}</td>
                                    <td class="has-text-centered">{{$service->price}}€</td>
                                    <td class="has-text-centered">
                                        @if($service->availability)
                                            <span class="dot" style="background-color: green"></span>
                                        @else
                                            <span class="dot" style="background-color: red"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('services.destroy',$service->id) }}"
                                              method="POST">
                                            <div class="row" style="margin: auto">
                                                @if($service->availability)
                                                    <div class="col-sm">
                                                        <a class="btn btn-danger btn-block"
                                                           href="{{route('services.disable', $service)}}">Disable</a>
                                                    </div>
                                                @else
                                                    <div class="col-sm">
                                                        <a class="btn btn-success btn-block"
                                                           href="{{route('services.disable', $service)}}">Enable</a>
                                                    </div>
                                                @endif
                                                <div class="col-sm ">
                                                    <a class="btn btn-primary btn-block"
                                                       href="{{route('services.edit', $service)}}">Edit/Show</a>
                                                </div>
                                                @csrf
                                                @method('DELETE')
                                                <div class="col-sm ">
                                                    <button type="submit" class="btn btn-danger btn-block">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success btn-block" href="{{ route('services.create') }}">Create a new
                            service</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <link href="{{ asset('css/adminIndex.css') }}" rel="stylesheet">
@endsection



