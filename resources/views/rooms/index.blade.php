@extends('layouts.admin-layout')

@section('content')

    <div class="bootstrap-iso">
        <div class="container-fluid">
            <!-- Inizio sezione immagini e ricerca -->
            <div class="row">
                <!-- Inizio sezione  ricerca -->
                <div class="col-sm-3 my-2 mx-5">
                    <h1 class="text-center">Search</h1>
                    <div class="my-4 bg-warning rounded">
                        <div class="card-body">
                            <form class="form-inline" action="">


                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 my-2 mx-5">
                    <h1 class="text-center">Our rooms</h1>
                    <div class="my-4 bg-warning rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <button type="button"
                                            class="btn btn-success text-uppercase text-center"
                                            onclick="location.href='{{ route('rooms.create') }}'">
                                        ADD NEW ROOM
                                    </button>
                                </div>
                                <div class="col-sm-3">
                                    @if(!$rooms)
                                        <p>No rooms in this page.</p>
                                    @else
                                        <button type="button"
                                                class="btn btn-success text-uppercase text-center"
                                                onclick="location.href='{{ route('rooms.disableIndex') }}'">
                                            DISABLE ROOMS
                                        </button>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    <p class="success"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @forelse ($rooms as $room)
                        <div class="row">
                            <div class="bg-warning rounded my-2 ">
                                <div class="card-body">
                                    <div class="row my-1">
                                        <div class="col-sm-4">
                                            <img src="/storage/{{$room->images[0]->path}}" class='img-responsive'
                                                 alt="">
                                        </div>
                                        <div class="col">
                                            <div class="bg-light rounded" style="height: 100%">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <h3>{{$room->type}}</h3>
                                                            <h5>Availability:
                                                                @if($room->availability == 1)
                                                                    <span class="dot"
                                                                          style="background-color: green"></span>
                                                                @else
                                                                    <span class="dot"
                                                                          style="background-color: red"></span>
                                                                @endif
                                                            </h5>
                                                            <h5>Price: {{$room->price}}€</h5>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="row d-flex justify-content-center">
                                                                <button type="button"
                                                                        class="btn btn-block btn-primary text-uppercase text-center"
                                                                        onclick="location.href='{{ route('rooms.show', $room) }}'">
                                                                    SEE MORE
                                                                </button>
                                                            </div>
                                                            <br>
                                                            <div class="row d-flex justify-content-center">
                                                                <button type="button"
                                                                        class="btn btn-block btn-success text-uppercase text-center"
                                                                        onclick="location.href='{{ route('rooms.edit', $room) }}'">
                                                                    EDIT
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <style>
        .dot {
            height: 15px;
            width: 15px;
            border-radius: 50%;
            display: inline-block;
        }
    </style>


@endsection

