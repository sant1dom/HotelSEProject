@extends('layouts.mainlayout')

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
                            <form method="GET" action="{{ route('rooms.index') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="startDate">Start Date: </label>
                                    <input id="startDate" type="date"
                                           class="form-control @error('date') is-invalid @enderror" name="email"
                                           value="{{ old('date') }}" min="<?php echo date('Y-m-d'); ?>"
                                           max="2030-12-31"/>
                                    <label for="endDate">End Date: </label>
                                    <input id="endDate" type="date"
                                           class="form-control @error('date') is-invalid @enderror" name="email"
                                           value="{{ old('date') }}" min="<?php echo date('Y-m-d'); ?>"
                                           max="2030-12-31"/>
                                    <div class="row">
                                        <div class="col my-2">
                                            <label class="control-label " for="select">
                                                N° of people
                                            </label>
                                        </div>
                                        <div class="col my-2">
                                            <label class="control-label" for="select">
                                                N° of rooms
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <select class="select form-control" id="select" name="select">
                                                <option value="1">
                                                    1
                                                </option>
                                                <option value="2">
                                                    2
                                                </option>
                                                <option value="3">
                                                    3
                                                </option>
                                                <option value="4">
                                                    4
                                                </option>
                                                <option value="5">
                                                    5
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="select form-control" id="select" name="select">
                                                <option value="1">
                                                    1
                                                </option>
                                                <option value="2">
                                                    2
                                                </option>
                                                <option value="3">
                                                    3
                                                </option>
                                                <option value="4">
                                                    4
                                                </option>
                                                <option value="5">
                                                    5
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase text-center"
                                        type="submit">
                                    SEARCH
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 my-2 mx-5">
                    <div class="row">
                        <h1 class="text-center">Our rooms</h1>
                    </div>
                    @forelse ($rooms as $room)
                        <div class="row">
                            <div class="bg-warning rounded my-2 ">
                                <div class="card-body">
                                    <div class="row my-1">
                                        <div class="col-sm-4">
                                            <img src="/uploads/{{$room->images[0]->path}}" class='img-responsive' alt="">
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
                                                        <div class="col-sm-4 d-flex justify-content-center">
                                                            <button type="button"
                                                                    class="btn btn-primary text-uppercase text-center"
                                                                    onclick="location.href='{{ route('rooms.userShow', $room) }}'">
                                                                SEE MORE
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
                    @empty
                        <p>No rooms in this page.</p>
                        <br>
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

