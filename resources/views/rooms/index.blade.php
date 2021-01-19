@extends('layouts.admin-layout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <h4 class="title has-text-centered text-light font-weight-bold" style="font-size:3vw;">
                Rooms management
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
                            <table class="table table-fixed table-striped header-fixed table-bordered" id="roomsTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="header has-text-centered" scope="col">Room number</th>
                                    <th class="header has-text-centered" scope="col">Type</th>
                                    <th class="header has-text-centered" scope="col">Availability</th>
                                    <th class="header has-text-centered" scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rooms as $room)
                                    <tr>
                                        <td>{{$room->numroom}}</td>
                                        <td>{{$room->type}}</td>
                                        <td class="has-text-centered">
                                            @if($room->availability)
                                                <span class="dot" style="background-color: green"></span>
                                            @else
                                                <span class="dot" style="background-color: red"></span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="row" style="margin: auto">
                                                @if($room->availability)
                                                    <div class="col-sm">
                                                        <a class="btn btn-danger btn-block"
                                                           href="{{route('rooms.disable', $room)}}">Disable</a>
                                                    </div>
                                                @else
                                                    <div class="col-sm">
                                                        <a class="btn btn-success btn-block"
                                                           href="{{route('rooms.disable', $room)}}">Enable</a>
                                                    </div>
                                                @endif
                                                <div class="col-sm ">
                                                    <a class="btn btn-primary btn-block"
                                                       href="{{route('rooms.edit', $room)}}">Edit/Show</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success btn-block" href="{{route('rooms.create')}}">Create a new room</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <link href="{{ asset('css/adminIndex.css') }}" rel="stylesheet">
    <script src="{{asset('js/searchTable.js')}}"></script>
@endsection

