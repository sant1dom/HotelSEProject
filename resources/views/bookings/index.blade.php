@extends('layouts.admin-layout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <h4 class="title has-text-centered text-light font-weight-bold" style="font-size:3vw;">
                My Bookings
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
                    <div class="card-header d-flex justify-content-center">
                        <input type="text" id="search" class="form-control my-3" onkeyup="searchTable('roomsTable')"
                               placeholder="Search for room number..">
                    </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-wrapper-scroll-y table-scrollbar">
                            <table class="table table-fixed table-striped header-fixed table-bordered"
                                   id="guestsTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="header has-text-centered" scope="col">Room</th>
                                    <th class="header has-text-centered" scope="col">Check-in date</th>
                                    <th class="header has-text-centered" scope="col">Check-out date</th>
                                    <th class="header has-text-centered" scope="col">Booking code</th>
                                    <th class="header has-text-centered" scope="col">Actions</th>
                                </tr>
                                </thead>
                                @if(isset($bookings))
                                    @foreach($bookings as $booking)
                                        <tbody>
                                        <tr>
                                            <td class="has-text-centered">
                                                {{$booking->rooms[0]->type}},
                                                N°{{$booking->rooms[0]->numroom}}</td>
                                            <td class="has-text-centered">
                                                @if($booking->check_in)
                                                    <span class="dot" style="background-color: green"></span>
                                                @else
                                                    <span class="dot" style="background-color: red"></span>
                                                @endif
                                                {{$booking->from}}
                                            </td>
                                            <td class="has-text-centered">
                                                @if($booking->check_out)
                                                    <span class="dot" style="background-color: green"></span>
                                                @else
                                                    <span class="dot" style="background-color: red"></span>
                                                @endif
                                                {{$booking->to}}
                                            </td>
                                            <td class="has-text-centered">
                                                {{$booking->booking_code}}
                                            </td>
                                            <td class="has-text-centered">
                                                <div class="col-sm">
                                                    <a class="btn btn-primary btn-block"
                                                       href="{{route('bookings.edit', $booking)}}">Edit/Show</a>
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

    <link href="{{ asset('css/adminIndex.css') }}" rel="stylesheet">
    <script src="{{asset('js/searchTable.js')}}"></script>
@endsection
