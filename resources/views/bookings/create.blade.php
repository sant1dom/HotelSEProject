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
    <form method="POST" action="{{ route('bookings.store') }}" enctype="multipart/form-data" id="main-form">@csrf</form>
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
                                        <label for="startDate">Start Date: </label>
                                        <input id="startDate" type="date"
                                               class="form-control @error('startDate') is-invalid @enderror"
                                               name="startDate"
                                               value="{{ old('startDate') }}"
                                               min="<?php echo date('Y-m-d'); ?>"
                                               max="2030-12-31" form="main-form"/>
                                        <label for="endDate">End Date: </label>
                                        <input id="endDate" type="date"
                                               class="form-control @error('endDate') is-invalid @enderror"
                                               name="endDate"
                                               value="{{ old('endDate') }}" min="<?php echo date('Y-m-d'); ?>"
                                               max="2030-12-31" form="main-form"/>
                                        <label for="ourRooms">Our rooms: </label>
                                        <select class="form-control @error('type') is-invalid @enderror"
                                                id="ourRooms"
                                                name="ourRooms" form="main-form">
                                            @foreach($rooms as $room)
                                                @if(isset($userIndexRoomId) && $room->id == $userIndexRoomId)
                                                    <option value="{{$room->id}}" selected>
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
                                <div class="card booking-form-inner mx-5 my-5">
                                    <div class="card-body">
                                        <div class="separator"><h4 class=" has-text-centered">Guests</h4></div>
                                        <div class="row d-flex justify-content-center">
                                            <label>Select your guests and yourself</label>
                                        </div>
                                        <div class="row d-flex justify-content-center mx-3">
                                            <select class="my-select show-tick" multiple
                                                    data-live-search="true"
                                                    name="guest[]"
                                                    form="main-form" id="guests" title="Choose from your guests"
                                                    data-style="btn-info" data-width="100%" data-size="10"
                                                    data-actions-box="true" data-container="body">
                                                @if($guests)
                                                    @foreach($guests as $guest)
                                                        <option value="{{$guest->id}}">{{$guest->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center"><i class="fa fa-plus formAdd"></i>
                                    </div>
                                    <div class="row d-flex justify-content-center guestContainer"
                                         id="guestContainer">
                                        <form method="POST" action="{{ route('guests.store') }}"
                                              enctype="multipart/form-data" id="sub-form">@csrf</form>
                                        <input name="user_id" type="hidden" value="{{$user->id}}" form="sub-form">
                                        <div class="col-sm-6 my-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label For="name">First name:</label>
                                                    <input
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        type="text" id="name"
                                                        name="name[]" form="sub-form">
                                                    <label for="surname">Last name:</label>
                                                    <input
                                                        class="form-control @error('surname') is-invalid @enderror"
                                                        type="text" id="surname"
                                                        name="surname[]" form="sub-form">
                                                    <label for="doctype">Document type:</label>
                                                    <input
                                                        class="form-control @error('doctype') is-invalid @enderror"
                                                        type="text" id="doctype"
                                                        name="doctype[]" form="sub-form">
                                                    <label for="numdoc">Document number:</label>
                                                    <input
                                                        class="form-control @error('numdoc') is-invalid @enderror"
                                                        type="text" id="numdoc"
                                                        name="numdoc[]" form="sub-form">
                                                    <label for="birthdate">Birth date:</label>
                                                    <input
                                                        class="form-control @error('birthdate') is-invalid @enderror"
                                                        type="date" id="birthdate"
                                                        name="birthdate[]" form="sub-form"
                                                        max="  <?php echo date('Y-m-d'); ?>  ">
                                                </div>
                                            </div>
                                            <i class="fa fa-times del"> </i>
                                        </div>
                                    </div>
                                    <button
                                        class="btn btn-lg btn-primary btn-block text-uppercase text-center"
                                        type="submit" form="sub-form">
                                        Save your new guests
                                    </button>
                                </div>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="btn btn-lg btn-success text-uppercase text-center"
                                type="submit" form="main-form">
                                Complete your booking!
                            </button>
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

        .alert {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 999;
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
                        '<input class="form-check-input" type="checkbox" name="'+ option +'[]" value="{{$i}}" form="main-form">' +
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
