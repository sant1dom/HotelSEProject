@extends('layouts.mainlayout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <div class="container has-text-centered" style="top: 40%">
                <h4 class="title text-light font-weight-bold" style="font-size:4vw;">
                    Booking form
                </h4>
            </div>
        </div>
    </section>
    <form method="GET" action="{{ route('bookings.stepTwo') }}" id="main-form">
        <div class="bootstrap-iso">
            <section class="hero is-bold">
                <div class="hero-body" style="height: 100%">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-8">
                            <div class="card" id="booking-form">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="card booking-form-inner mx-5 my-5">
                                        <div class="card-body">
                                            <div class="separator"><h4 class=" has-text-centered">Check-in &
                                                    Check-out</h4>
                                            </div>
                                            <label for="from">Start Date: </label>

                                            <input id="from" type="date"
                                                   class="form-control @error('from') is-invalid @enderror"
                                                   name="from"
                                                   @if(isset($request->from))
                                                   value="{{$request->from}}"
                                                   @else
                                                   value="{{old('from')}}"
                                                   @endif
                                                   min="<?php echo date('Y-m-d'); ?>"
                                                   max="2030-12-31" form="main-form"/>

                                            <label for="to">End Date: </label>
                                            <input id="to" type="date"
                                                   class="form-control @error('to') is-invalid @enderror"
                                                   name="to"
                                                   @if(isset($request->to))
                                                   value="{{$request->to}}"
                                                   @else
                                                   value="{{old('to')}}"
                                                   @endif
                                                   min="<?php echo date('Y-m-d'); ?>"
                                                   max="2030-12-31" form="main-form"/>
                                            <label for="ourRooms">Our rooms: </label>
                                            <select class="form-control @error('type') is-invalid @enderror"
                                                    id="ourRooms"
                                                    name="ourRooms" form="main-form">
                                                @foreach($rooms as $room)
                                                    @if(isset($request->userIndexRoomId) && $room->id == $request->userIndexRoomId)
                                                        <option value="{{$room->id}}" selected>
                                                            {{$room->type}}
                                                        </option>
                                                    @elseif(isset($request->ourRooms) && $room->id == $request->ourRooms)
                                                        <option value="{{$request->ourRooms}}" selected>
                                                            {{$room->type}}
                                                        </option>
                                                    @else
                                                        <option value="{{$room->id}}">
                                                            {{$room->type}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        @if(isset($request->guest))
                                            @foreach($request->guest as $guest)
                                                <input name="guest[]" type="hidden" value="{{$guest}}"
                                                       form="main-form">
                                            @endforeach
                                        @endif
                                        @if(isset($request->service))
                                            @foreach($request->service as $service)
                                                <input name="service[]" type="hidden" value="{{$service}}"
                                                       form="main-form">
                                            @endforeach
                                        @endif
                                    <div style="text-align:center;">
                                        <button class="btn btn-success" type="submit" id="prevBtn" style="width: 6rem"
                                                disabled><span>Previous</span></button>
                                        <span class="step" style="opacity: 1;"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <button class="btn btn-success" type="submit" id="nextBtn" style="width: 6rem"
                                                form="main-form"><span>Next</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </form>

    <style>
        .hero-body {
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 40%), url("https://www.atlantis.com/-/media/atlantis/dubai/atp/resort/exterior/AtlantisThePalm-Exterior-FrontShotWithRoyalPool.jpg?sc_lang=it");
            background-position: center bottom;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
        }

        #booking-form {
            height: 100%;
            width: 100%;
            border-radius: 20px;
            background-color: white !important;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);
        }

        .card.booking-form-inner {
            border-radius: 20px;
            border-color: goldenrod;
            background-color: white !important;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);
        }

        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }
    </style>
@endsection
