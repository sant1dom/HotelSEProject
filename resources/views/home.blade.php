@extends('layouts.mainlayout')

@section('content')
    <section class="hero is-fullheight is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h4 class="subtitle text-light font-weight-bold" style="font-size:2vw;">
                    @if (!is_null($hotel))
                        Welcome to a {{$hotel->stars}} <span class="text-warning">&#9733</span> hotel <br/>
                    @else
                        Hotel Name<br/>
                    @endif
                </h4>
                <h4 class="subtitle text-light font-weight-bold" style="font-size:4vw;">
                    @if (!is_null($hotel))
                        {{$hotel->hotelname}}<br/>
                    @else
                        Hotel Name<br/>
                    @endif
                </h4>
            </div>
        </div>

        <div class="border border-warning rounded" id="searchBar">
            <div class="card-body">
                <form method="GET" action="{{ route('rooms.userIndex') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4 float-left" style="margin: auto">
                            <label for="startDate">Check-in</label>
                            <input id="startDate" type="date"
                                   class="form-control @error('date') is-invalid @enderror" name="email"
                                   value="{{ old('date') }}" min="<?php echo date('Y-m-d'); ?>"
                                   max="2030-12-31"/>
                        </div>
                        <div class="col-sm-4 float-none" style="margin: auto">
                            <label for="endDate">Check-out</label>
                            <input id="endDate" type="date"
                                   class="form-control @error('date') is-invalid @enderror" name="email"
                                   value="{{ old('date') }}" min="<?php echo date('Y-m-d'); ?>"
                                   max="2030-12-31"/>
                        </div>
                        <div class="col-sm-4 float-right" style="margin-top: 2.5%">
                            <button class="btn btn-lg btn-primary btn-block text-uppercase text-center rounded-pill"
                                    type="submit">
                                SEARCH
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="bootstrap-iso">
        <br><br><br> <br> <br> <br>
        <div class="separator"><h1 class="title is-1 has-text-centered">Rooms in evidence</h1></div>
        <br><br><br>




        <?php
        $rooms = \App\Models\Room::latest()->take(4)->get()->unique('type');
        ?>
        @if($rooms)
            @foreach($rooms as $i => $room)
                @if($i % 2 == 0)
                    <div class="row d-flex justify-content-center" style="background-color: white;">
                        <div class="col-sm has-text-centered roomImage" style="margin: 2rem">
                            <img class="imageRoom img-responsive" src="/storage/{{$room->images[0]->path}}" alt="">
                            <div class="middle">
                                <button type="button"
                                        class="btn btn-primary btn-lg text-uppercase text-center rounded-pill"
                                        onclick="location.href='{{ route('rooms.userShow', $room) }}'">
                                    SEE MORE!
                                </button>
                            </div>
                        </div>
                        <div class="col-sm has-text-centered" style="margin: 2rem">
                            <h1>{{$room->type}}</h1>
                            <br>
                            <p>{{$room->description}}</p>
                        </div>
                    </div>


                @else
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm has-text-centered" style="margin: 2rem">
                            <h1>{{$room->type}}</h1>
                            <br>
                            <p>{{$room->description}}</p>
                        </div>
                        <div class="col-sm has-text-centered roomImage" style="margin: 2rem">
                            <img class="imageRoom img-responsive" src="/storage/{{$room->images[0]->path}}" alt="">
                            <div class="middle">
                                <button type="button"
                                        class="btn btn-primary btn-lg text-uppercase text-center rounded-pill"
                                        onclick="location.href='{{ route('rooms.userShow', $room) }}'">
                                    SEE MORE!
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
        <br>
        <div class="separatorEnd"></div>
    </div>

    <style>
        .hero {
            width: 100%;
            height: 100%;
            position: relative;
        }

        #searchBar {
            width: 60%;
            border-color: goldenrod;
            border-radius: 20px;
            background-color: white !important;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);
            position: absolute;
            left: 50%;
            top: 100%;
            transform: translate(-50%, -50%);
        }

        .imageRoom {
            width: 80%;
            height: 100%;
            transition: .5s ease;
            backface-visibility: hidden;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            box-shadow: 0 -3px 6px 2px rgba(0, 0, 0, 0.2);
        }

        .col-sm.has-text-centered.roomImage {
            position: relative;
            width: 50%;
        }

        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .col-sm.has-text-centered.roomImage:hover .imageRoom {
            opacity: 0.3;
        }

        .col-sm.has-text-centered.roomImage:hover .middle {
            opacity: 1;
        }

        .bootstrap-iso {
            background-color: rgb(242, 242, 242);
        }

        .separatorEnd {
            flex: 1;
            border-bottom: 1px solid #000;
        }
    </style>
@endsection

