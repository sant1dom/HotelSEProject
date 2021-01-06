@extends('layouts.mainlayout')

@section('content')
    <section class="hero is-fullheight is-bold">
        <div class="hero-body">
            <div class="container has-text-right">
                <h1 class="title text-light font-weight-bold" style="font-size:8vw;">Welcome to <br/>
                    @if (!is_null($hotel))
                        {{$hotel->hotelname}}
                    @else
                        Hotel Name
                    @endif
                </h1>

            </div>
        </div>
    </section>

    <br>
    <br>

    <div class="separator"><h1 class="title is-1 has-text-centered">Our Rooms</h1></div>

    <br>
    <br>

    <div class="row">
        <div class="col-sm-2 mx-5">
            <h1 class="text-center">Search rooms</h1>
            <div class="my-2 bg-warning rounded">
                <div class="card-body">
                    <form method="GET" action="{{ route('rooms.userIndex') }}">
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
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase text-center"
                                type="submit">
                            SEARCH
                        </button>
                    </form>
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <button type="button"
                        class="btn btn-primary text-uppercase text-center"
                        onclick="location.href='{{ route('rooms.userIndex') }}'">
                    SEE All ROOMS
                </button>
            </div>
        </div>
        <div class="columns has-text-centered">
            <?php
            $rooms = \App\Models\Room::latest()->take(3)->get()->unique('type');
            ?>
            @foreach($rooms as $room)
                <div class="card bg-light mb-3 mx-4" style="max-width: 30rem;">
                    <div class="card-header"><h5>{{$room->type}}</h5></div>
                    <div class="card-body">
                        <img src="/storage/{{$room->images[0]->path}}" alt="">
                    </div>
                    <a class="btn btn-lg btn-primary btn-block text-uppercase text-center" id="seeRoom" href="{{ route('rooms.userShow', $room) }}">See this room</a>
                </div>
            @endforeach
        </div>
    </div>


    <br>
    <br>

    <div class="separator"><h1 class="title is-1 has-text-centered">~</h1></div>
@endsection

