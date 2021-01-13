@extends('layouts.admin-layout')

@section('content')
    <section class="hero is-fullheight is-bold" style="overflow:hidden;">
        <div class="hero-body">
            <div class="container-fluid dashboard">
                <div class="col-sm-12">
                    <div class="card hoverCard bg-warning">
                        <div class="card-body">
                            {{--Yellow background--}}
                        </div>
                    </div>
                    <div class="card dashboard">
                        <h5 class="card-header d-flex justify-content-center">
                              {{ $rooms->links( "pagination::bootstrap-4" ) }}
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
                            <div id="collapse1">
                                <div class="table-responsive-sm">
                                    <table class="table table-fixed table-striped header-fixed">
                                        <thead style="position: sticky; top: 0" class="thead-dark">
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
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-success btn-block" href="{{route('rooms.create')}}">Create a new room</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .hero {
            position: absolute;
        }

        #collapse1 {
            height: 34rem;
            width: 100%;
        }

        .card.hoverCard {
            width: 68%;
            height: 100%;
            border-color: black;
            border-radius: 20px;
            left: 13%;
            bottom: 56%;
            position: absolute;
        }

        .card.dashboard {
            z-index: 1;
            height: 50%;
            width: 70%;
            border-color: black;
            border-radius: 20px;
            background-color: white !important;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);
            position: relative;
            left: 50%;
            top: 100%;
            transform: translate(-50%, -50%);
        }

        .container-fluid.dashboard {
            max-width: 80%;
            max-height: 50%;
            margin-top: 17%;
        }

        .dot {
            height: 15px;
            width: 15px;
            border-radius: 50%;
            display: inline-block;
        }

        .header {
            position: sticky;
            top: 0;
        }

        .alert {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 999;
        }

    </style>
@endsection

