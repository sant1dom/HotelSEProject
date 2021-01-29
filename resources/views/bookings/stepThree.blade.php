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
    <form method="GET" action="{{ route('bookings.stepFour') }}" id="main-form"></form>
    <form method="GET" action="{{ route('bookings.stepTwo') }}" id="back-form"></form>
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
                                        <div class="separator"><h4 class=" has-text-centered">Services</h4></div>
                                        <div class="row d-flex justify-content-center mx-3">
                                            <select
                                                class="my-select show-tick  @error('service') is-invalid @enderror"
                                                multiple
                                                data-live-search="true"
                                                name="service[]"
                                                form="main-form" id="services"
                                                title="Choose the services you want"
                                                data-style="btn-info" data-width="100%"
                                                data-size="10"
                                                data-actions-box="true" data-container="body">
                                                @if($services)
                                                    @for($j=0, $i=0; $i<count($services); $i++)
                                                        @if(isset($request->service[$j]) && $services[$i]->id == $request->service[$j])
                                                            <option value="{{$services[$i]->id}}" selected>
                                                                {{$services[$i]->name}}
                                                            </option>
                                                            {{$j++}}
                                                        @else
                                                            <option
                                                                value="{{$services[$i]->id}}">{{$services[$i]->name}}
                                                            </option>
                                                        @endif
                                                    @endfor
                                                @endif
                                            </select>
                                        </div>

                                        <div class="container-fluid my-4" id="servicesContainer">


                                        </div>
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
                                            <span class="step" style="opacity: 1;"></span>
                                            <span class="step"></span>
                                            <button class="btn btn-success" type="submit" id="nextBtn"
                                                    style="width: 6rem"
                                                    form="main-form"><span>Next</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('js/dynamicForm.js') }}"></script>
    <link href="{{ asset('css/dynamicFormStyle.css') }}" rel="stylesheet">

    <style>
        .alert {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 999;
        }

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

    <script>

        $(function () {
            $('.my-select').selectpicker(
                {dropupAuto: false}
            );
        });

        window.onload = function() {
            selectDays();
        };

        $(document).on("change", "#services", function(){
            selectDays();
        });

        function selectDays () {
            let serviceSelect = document.querySelector('#services');
            let selected = Array.from(serviceSelect.options).filter(function (option) {
                return option.selected;
            }).map(function (option) {
                return option.text;
            });

            let servicesContainer = document.querySelector('#servicesContainer');
            let serviceContainerChild = Array.from(servicesContainer.childNodes);
            serviceContainerChild.forEach(function (child) {
                child.remove();
            });

            let fromInput = document.getElementById('fromValue').value;
            let from = fromInput.charAt(8) + fromInput.charAt(9);
            parseInt(from);
            let toInput = document.getElementById('toValue').value;
            let to = toInput.charAt(8) + toInput.charAt(9);
            parseInt(to);

            let days = to - from;

            selected.forEach(function (option) {
                let fromIteration = from;

                $("#servicesContainer").append('<label>' +
                    option +
                    '</label>' +
                    '<br>');

                for (let i = days, j = 0; i > 0; i--, j++) {
                    $("#servicesContainer").append(
                        '<div class="form-check form-check-inline">' +
                        '<input class="form-check-input" type="checkbox" name="' + option + '[]" value="' + j + '" form="main-form">' +
                        '<label class="form-check-label" for="inlineCheckbox1">' + fromIteration++ + '</label>' +
                        '</div>');
                }

                $("#servicesContainer").append(
                    '<br>');
            })
        }
    </script>
@endsection

