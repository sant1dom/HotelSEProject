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
    <form method="GET" action="{{ route('bookings.store') }}" id="main-form"></form>
    <form method="GET" action="{{ route('bookings.stepThree') }}" id="back-form"></form>
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
                                        <div class="separator"><h4 class=" has-text-centered">Confirmation</h4>
                                        </div>
                                        <h5>Booking from: {{$request->from}} to: {{$request->to}}. For the
                                            room: {{$room->type}}</h5>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm">
                                            Total price: {{$totalPrice}}€
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm">
                                                <h5>Guests selected for this stay:</h5>
                                                @foreach($guests as $i=> $guest)
                                                    <p>-{{$guest->name}}.</p>
                                                @endforeach
                                            </div>
                                            <div class="col-sm">
                                                @if(isset($services))
                                                    <h5>Services selected for this stay: </h5>
                                                    @foreach($services as $i=> $service)
                                                        <p>-{{$service->name}}. For days:
                                                            @foreach($request->optionDays[$i] as $j=> $days)
                                                                | {{ $days }}
                                                            @endforeach
                                                        </p>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach($services as $i=> $service)
                                    @foreach($request->optionDays[$i] as $j=> $optionDay)
                                        <input name="optionDays[{{$i}}][{{$j}}]" type="hidden" value="{{$optionDay}}"
                                               form="main-form">
                                    @endforeach
                                @endforeach
                                <input name="from" type="hidden" value="{{$request->from}}"
                                       form="main-form">
                                <input name="to" type="hidden" value="{{$request->to}}"
                                       form="main-form">
                                <input name="ourRooms" type="hidden" value="{{$request->ourRooms}}"
                                       form="main-form">
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

                                <input name="from" type="hidden" value="{{$request->from}}"
                                       form="back-form" id="fromValue">
                                <input name="to" type="hidden" value="{{$request->to}}"
                                       form="back-form" id="toValue">
                                <input name="ourRooms" type="hidden" value="{{$request->ourRooms}}"
                                       form="back-form">
                                @if(isset($request->guest))
                                    @foreach($request->guest as $guest)
                                        <input name="guest[]" type="hidden" value="{{$guest}}"
                                               form="back-form">
                                    @endforeach
                                @endif
                                @if(isset($request->service))
                                    @foreach($request->service as $service)
                                        <input name="service[]" type="hidden" value="{{$service}}"
                                               form="back-form">
                                    @endforeach
                                @endif
                                <div style="text-align:center;">
                                    <button class="btn btn-success" type="submit" id="prevBtn"
                                            style="width: 6rem"
                                            form="back-form"><span>Previous</span></button>
                                    <span class="step" style="background-color: #4CAF50;"></span>
                                    <span class="step" style="background-color: #4CAF50;"></span>
                                    <span class="step" style="background-color: #4CAF50;"></span>
                                    <span class="step" style="opacity: 1;"></span>
                                    <button class="btn btn-primary" type="submit" id="pay"
                                            style="width: 6rem"
                                            form="main-form"><span>Pay</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


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
