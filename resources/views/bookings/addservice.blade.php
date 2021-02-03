@extends('layouts.mainlayout')
@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <h4 class="title has-text-centered text-light font-weight-bold" style="font-size:3vw;">
                My Bookings
            </h4>
        </div>
    </section>

    <section class="hero is-bold">
        <div class="hero-body">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="container dashboard">
                <div class="card dashboard">
                    <div class="card-header d-flex justify-content-center">
                        <input type="text" id="search" class="form-control my-1" onkeyup="searchTable('guestsTable')"
                               placeholder="Search for service.." autocomplete="off">
                    </div>
                    <div class="card-body">
                        <div class="table-wrapper-scroll-y table-scrollbar">
                            <table class="table table-fixed table-striped header-fixed table-bordered"
                                   id="guestsTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="header has-text-centered" scope="col">Service Name</th>
                                    <th class="header has-text-centered" scope="col">Price</th>
                                    <th class="header has-text-centered" scope="col">Actions</th>
                                </tr>
                                </thead>
                                @if(isset($services))
                                    @foreach($services as $service)
                                        <tbody>
                                        <tr>
                                            <td class="has-text-centered">
                                                {{$service->name}}</td>
                                            <td class="has-text-centered">
                                                {{$service->price}} €
                                            </td>
                                            <td class="has-text-centered">
                                                <div class="col-sm">
                                                    <a class="btn btn-primary btn-block"
                                                       href="{{route('bookings.addservice', $booking)}}">Add Service</a>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('js/searchTable.js')}}"></script>
@endsection
