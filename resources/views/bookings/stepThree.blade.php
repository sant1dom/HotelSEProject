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
                                        <div class="card">
                                            <div class="card-body">
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
                                                            @foreach($services as $service)
                                                                <option
                                                                    value="{{$service->id }}">{{$service->name}}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="container-fluid my-4" id="servicesContainer">


                                                </div>
                                            </div>
                                            <input name="startDate" type="hidden" value="{{$request->startDate}}"
                                                   form="back-form">
                                            <input name="endDate" type="hidden" value="{{$request->endDate}}"
                                                   form="back-form">
                                            <input name="ourRooms" type="hidden" value="{{$request->ourRooms}}"
                                                   form="back-form">
                                            @if(isset($request->guest))
                                                @foreach($request->guest as $guest)
                                                    <input name="guestRQ[]" type="hidden" value="{{$guest}}"
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
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('js/dynamicForm.js') }}"></script>
    <link href="{{ asset('css/dynamicFormStyle.css') }}" rel="stylesheet">

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

    <script>

        $(function () {
            $('.my-select').selectpicker(
                {dropupAuto: false}
            );
        });

        $(document).on("change", "#services", function () {
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

            selected.forEach(function (option) {
                $("#servicesContainer").append('<label>' +
                    option +
                    '</label>' +
                    '<div class="card">' +
                    '<div class="card-body">' +
                    '@for($i=0; $i<10; $i++)' +
                    '<div class="form-check form-check-inline">' +
                    '<input class="form-check-input" type="checkbox" name="' + option + '[]" value="{{$i}}" form="main-form">' +
                    '<label class="form-check-label" for="inlineCheckbox1">day</label>' +
                    '</div>' +
                    '@endfor' +
                    '</div>' +
                    '</div>'
                );
            });
        });
    </script>
@endsection

