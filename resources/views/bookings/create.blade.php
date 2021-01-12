@extends('layouts.mainlayout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <div class="container has-text-centered" style="top: 30%">
                <h4 class="title text-light font-weight-bold" style="font-size:4vw;">
                    Booking form
                </h4>
            </div>
        </div>
    </section>
    <form method="POST" action="{{ route('bookings.create') }}" enctype="multipart/form-data" id="main-form"></form>
    @csrf
    <div class="bootstrap-iso">
        <div class="margin"></div>
        <div class="row d-flex justify-content-center">
            <div class="col-sm mx-5">
                <section class="hero is-fullheight is-bold">
                    <div class="hero-body"></div>
                </section>
            </div>
            <div class="col-sm-6">
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
                                <div class="separator"><h4 class=" has-text-centered">Check-in & Check-out</h4></div>
                                <label for="startDate">Start Date: </label>
                                <input id="startDate" type="date"
                                       class="form-control @error('date') is-invalid @enderror" name="email"
                                       value="{{ old('date') }}"
                                       min="<?php echo date('Y-m-d'); ?>"
                                       max="2030-12-31"/>
                                <label for="endDate">End Date: </label>
                                <input id="endDate" type="date"
                                       class="form-control @error('date') is-invalid @enderror" name="email"
                                       value="{{ old('date') }}" min="<?php echo date('Y-m-d'); ?>"
                                       max="2030-12-31"/>
                                <label for="ourRooms">Our rooms: </label>
                                <select class="form-control @error('type') is-invalid @enderror" id="ourRooms"
                                        name="ourRooms">
                                    @foreach($rooms as $room)
                                        <option>
                                            {{$room->type}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card booking-form-inner mx-5 my-5">
                            <div class="card-body">
                                <div class="separator"><h4 class=" has-text-centered">Guests</h4></div>
                                <div class="card">
                                    <div class="card-body">
                                        <div id="collapse1">
                                            <div class="table-responsive-sm">
                                                <table class="table table-fixed table-striped header-fixed">
                                                    <thead style="position: sticky; top: 0" class="thead-dark">
                                                    <tr>
                                                        <th class="header has-text-centered" scope="col">Name</th>
                                                        <th class="header has-text-centered" scope="col">Surname
                                                        </th>
                                                        <th class="header has-text-centered" scope="col">Select</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($guests)
                                                        @foreach($guests as $guest)
                                                            <tr>
                                                                <td>{{$guest->name}}</td>
                                                                <td>{{$guest->surname}}</td>
                                                                <td><input
                                                                        class="form-check-input position-static @error('guest') is-invalid @enderror"
                                                                        type="checkbox" id="guest"
                                                                        value="{{$guest->id }}" aria-label="...">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('guests.store') }}"
                                      enctype="multipart/form-data" id="sub-form">
                                    @csrf
                                    <i class="fa fa-plus formAdd"></i> Add guests
                                    <div class="row d-flex justify-content-center guestContainer"
                                         id="guestContainer">
                                        <div class="col-sm-6 my-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label For="name">First name:</label>
                                                    <input class="form-control @error('name') is-invalid @enderror"
                                                           type="text" id="name"
                                                           name="name[]" form="sub-form">
                                                    <label for="surname">Last name:</label>
                                                    <input class="form-control @error('surname') is-invalid @enderror"
                                                           type="text" id="surname"
                                                           name="surname[]" form="sub-form">
                                                    <label for="doctype">Document type:</label>
                                                    <input class="form-control @error('doctype') is-invalid @enderror"
                                                           type="text" id="doctype"
                                                           name="doctype[]" form="sub-form">
                                                    <label for="numdoc">Document number:</label>
                                                    <input class="form-control @error('numdoc') is-invalid @enderror"
                                                           type="text" id="numdoc"
                                                           name="numdoc[]" form="sub-form">
                                                    <label for="birthdate">Birth date:</label>
                                                    <input class="form-control @error('birthdate') is-invalid @enderror"
                                                           type="date" id="birthdate"
                                                           name="birthdate[]" form="sub-form"
                                                           max="  <?php echo date('Y-m-d'); ?>  ">
                                                </div>
                                            </div>
                                            <i class="fa fa-times del"> </i>
                                        </div>
                                    </div>
                                    <button
                                        class="btn btn-lg btn-primary btn-block text-uppercase text-cente"
                                        type="submit" form="sub-form">
                                        Add to your guests
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="card booking-form-inner mx-5 my-5">
                            <div class="card-body">
                                <div class="separator"><h4 class=" has-text-centered">Services</h4></div>
                                <div class="card">
                                    <div class="card-body">
                                        <div id="collapse1">
                                            <div class="table-responsive-sm">
                                                <table class="table table-fixed table-striped header-fixed">
                                                    <thead style="position: sticky; top: 0" class="thead-dark">
                                                    <tr>
                                                        <th class="header has-text-centered" scope="col">Name</th>
                                                        <th class="header has-text-centered" scope="col">Chose dates
                                                        </th>
                                                        <th class="header has-text-centered" scope="col">Select</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($services)
                                                        @foreach($services as $service)
                                                            <tr>
                                                                <td>{{$service->name}}</td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-sm">

                                                                            <input id="startDate" type="date"
                                                                                   class="form-control @error('date') is-invalid @enderror"
                                                                                   name="email"
                                                                                   value="{{ old('date') }}"
                                                                                   min="<?php echo date('Y-m-d'); ?>"
                                                                                   max="2030-12-31"/>
                                                                        </div>
                                                                        <div class="col-sm">

                                                                            <input id="endDate" type="date"
                                                                                   class="form-control @error('date') is-invalid @enderror"
                                                                                   name="email"
                                                                                   value="{{ old('date') }}"
                                                                                   min="<?php echo date('Y-m-d'); ?>"
                                                                                   max="2030-12-31"/>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input
                                                                        class="form-check-input position-static @error('guest') is-invalid @enderror"
                                                                        type="checkbox" id="guest"
                                                                        value="{{$service->id }}" aria-label="...">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
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
            <div class="col-sm mx-5">
                <section class="hero is-fullheight is-bold">
                    <div class="hero-body"></div>
                </section>
            </div>
        </div>

        <div class="margin"></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('js/dynamicForm.js') }}"></script>
    <link href="{{ asset('css/dynamicFormStyle.css') }}" rel="stylesheet">

    <style>
        .margin {
            height: 5rem;
            background-color: rgb(242, 242, 242);
        }

        .hero-body {
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 40%), url("https://www.atlantis.com/-/media/atlantis/dubai/atp/resort/exterior/AtlantisThePalm-Exterior-FrontShotWithRoyalPool.jpg?sc_lang=it");
            background-position: center bottom;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
            height: 20rem;
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

        #collapse1 {
            max-height: 25rem;
            width: 100%;
            overflow-y: scroll;
        }

        #collapse1::-webkit-scrollbar {
            display: none;
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
