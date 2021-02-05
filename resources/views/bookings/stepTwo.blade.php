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
    <form method="GET" action="{{ route('bookings.stepThree') }}" id="main-form"></form>
    <form method="GET" action="{{ route('bookings.stepOne') }}" id="back-form"></form>
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
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                                         id="alert-success">
                                        <h1>{{ session()->get('success') }}</h1>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="card booking-form-inner mx-5 my-5">
                                    <div class="card-body" style="min-height: 37rem">
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
                                                    @for($j=0, $i=0; $i<count($guests); $i++)
                                                        @if(isset($request->guest[$j]) && $guests[$i]->id == $request->guest[$j])
                                                            <option value="{{$guests[$i]->id}}" selected>
                                                                {{$guests[$i]->name}} {{$guests[$i]->surname}}
                                                            </option>
                                                            {{$j++}}
                                                        @else
                                                            <option
                                                                value="{{$guests[$i]->id}}">
                                                                {{$guests[$i]->name}} {{$guests[$i]->surname}}
                                                            </option>
                                                        @endif
                                                    @endfor
                                                @endif
                                            </select>
                                        </div>

                                        <div class="row d-flex justify-content-center">
                                            <i class="fa fa-plus formAdd my-2"></i>
                                        </div>
                                        <div class="row d-flex justify-content-center guestContainer"
                                             id="guestContainer">
                                            <form method="POST" action="{{ route('guests.store') }}"
                                                  enctype="multipart/form-data" id="sub-form">@csrf</form>
                                            <input name="from" type="hidden" value="{{$request->from}}"
                                                   form="sub-form">
                                            <input name="to" type="hidden" value="{{$request->to}}"
                                                   form="sub-form">
                                            <input name="ourRooms" type="hidden" value="{{$request->ourRooms}}"
                                                   form="sub-form">
                                            <div class="col-sm-6">
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
                                    </div>
                                    <button
                                        class="btn btn-lg btn-primary btn-block text-uppercase text-center"
                                        type="submit" form="sub-form">
                                        Save your new guests
                                    </button>
                                </div>
                                <input name="from" type="hidden" value="{{$request->from}}"
                                       form="sub-form">
                                <input name="to" type="hidden" value="{{$request->to}}"
                                       form="sub-form">
                                <input name="ourRooms" type="hidden" value="{{$request->ourRooms}}"
                                       form="sub-form">
                                @if(isset($request->guest))
                                    @foreach($request->guest as $guest)
                                        <input name="guest[]" type="hidden" value="{{$guest}}"
                                               form="sub-form">
                                    @endforeach
                                @endif
                                @if(isset($request->service))
                                    @foreach($request->service as $service)
                                        <input name="service[]" type="hidden" value="{{$service}}"
                                               form="sub-form">
                                    @endforeach
                                @endif

                                <input name="from" type="hidden" value="{{$request->from}}"
                                       form="main-form">
                                <input name="to" type="hidden" value="{{$request->to}}"
                                       form="main-form">
                                <input name="ourRooms" type="hidden" value="{{$request->ourRooms}}"
                                       form="main-form">

                                @if(isset($request->service))
                                    @foreach($request->service as $service)
                                        <input name="service[]" type="hidden" value="{{$service}}"
                                               form="main-form">
                                    @endforeach
                                @endif

                                <input name="from" type="hidden" value="{{$request->from}}"
                                       form="back-form">
                                <input name="to" type="hidden" value="{{$request->to}}"
                                       form="back-form">
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
                                    <button class="btn btn-success" type="submit" id="prevBtn" style="width: 6rem"
                                            form="back-form"><span>Previous</span></button>
                                    <span class="step" style="background-color: #4CAF50;"></span>
                                    <span class="step" style="opacity: 1;"></span>
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

        .alert {
            position: absolute;
            top: 25%;
            left: 0;
            right: 0;
            margin: auto;
            text-align: center;
            width: 80%;
            z-index: 999;
        }
    </style>

    <script>
        $(function () {
            $('.my-select').selectpicker(
                {dropupAuto: false}
            );
        });
    </script>
@endsection
