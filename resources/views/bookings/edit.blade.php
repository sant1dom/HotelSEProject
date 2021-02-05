@extends('layouts.mainlayout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h4 class="title text-light font-weight-bold" style="font-size:4vw;">
                    My booking
                </h4>
            </div>
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
        </div>
    </section>
    <div class="bootstrap-iso">
        <div class="row d-flex justify-content-center" style="margin-left: 1rem; margin-right: 1rem;">
            <div class="col-sm rounded has-text-centered whiteCard" style=" margin: 1rem">
                <div class="row d-flex justify-content-center" style="margin: 2rem;">
                    <h1>{{$room->type}}</h1>
                </div>

                <div class="row d-flex justify-content-center" style="margin: 2rem;">
                    <p>{{$room->description}}</p>
                </div>

                <div class="row has-text-centered bottomLine">
                    <p>For max {{$room->capacity}} people. Price per
                        person: {{$room->price}}€
                    </p>
                </div>
            </div>
            <div class="col-sm rounded has-text-centered whiteCard" style="min-height: 15vw; margin: 1rem ">
                <div class="row d-flex justify-content-center" style="margin: 2rem;">
                    <h1>Check-in & Check-out</h1>
                </div>
                <div class="row" style="margin: 2rem;">
                    @if($booking->check_in)
                        <span class="dot" style="background-color: green"></span>
                    @else
                        <span class="dot" style="background-color: red"></span>
                    @endif
                    <h1 id="fromValue">{{$booking->from}}</h1>
                </div>
                <div class="row" style="margin: 2rem;">
                    @if($booking->check_out)
                        <span class="dot" style="background-color: green"></span>
                    @else
                        <span class="dot" style="background-color: red"></span>
                    @endif
                    <h1 id="toValue">{{$booking->to}}</h1>
                </div>
            </div>
            <div class="col-sm rounded whiteCard" style="min-height: 20vw; margin: 1rem ">
                <div class="row d-flex justify-content-center" style="margin: 2rem;">
                    <h1>Guests:</h1>
                </div>
                @if(isset($guests))
                    @foreach($guests as $i=> $guest)
                        <p>-{{$guest->name}} {{$guest->surname}}</p>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row d-flex justify-content-center" style="margin-left: 1rem; margin-right: 1rem">
            <div class="col-sm-3 rounded whiteCard" style="min-height: 20vw; margin: 1rem ">
                <div class="row d-flex justify-content-center" style="margin: 2rem;">
                    <h1>Services:</h1>
                </div>
                @if(isset($selectedServices))
                    @foreach($selectedServices as $i=> $service)
                        <p>-{{$service->name}}. For days:
                            @foreach($bookingServices as $i=> $bService)
                                @if($bService->pivot->service_id === $service->id)
                                    {{$bService->pivot->date}}
                                @endif
                            @endforeach
                        </p>
                    @endforeach
                @endif
            </div>
            <form method="POST" action="{{ route('bookings.update', $booking->id) }}" id="main-form">
                @csrf
                @method('PUT')
            </form>
            <div class="col-sm rounded whiteCard" style="min-height: 20vw; margin: 1rem ">
                <div class="row d-flex justify-content-center" style="margin: 2rem;">
                    <h1>Add services:</h1>
                </div>
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
                    {{--Se si vuole modificare i servizi già in uso--}}
                    {{-- @if($allServices)
                        @for($j=0, $i=0; $i<count($allServices); $i++)
                            @if(isset($bookingServices[$j]) && $allServices[$i]->id == $bookingServices[$j]->id)
                                <option value="{{$allServices[$i]->id}}" selected>
                                    {{$allServices[$i]->name}}
                                </option>
                                {{$j++}}
                            @else
                                <option
                                    value="{{$allServices[$i]->id}}">{{$allServices[$i]->name}}
                                </option>
                            @endif
                        @endfor
                    @endif--}}

                    {{--Se si vuole solo aggiungere servizi--}}
                    @if($allServices)
                        @for($j=0, $i=0; $i<count($allServices); $i++)
                            @if(isset($bookingServices[$j]) && $allServices[$i]->id == $bookingServices[$j]->id)
                                {{$j++}}
                            @else
                                <option
                                    value="{{$allServices[$i]->id}}">{{$allServices[$i]->name}}
                                </option>
                            @endif
                        @endfor
                    @endif
                </select>
                <div class="container-fluid my-4" id="servicesContainer"></div>
                <button class="btn btn-success" type="submit" id="addService"
                        style="margin-bottom: 1rem"
                        form="main-form">Add the service to your booking</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('js/dynamicForm.js') }}"></script>
    <link href="{{ asset('css/dynamicFormStyle.css') }}" rel="stylesheet">

    <style>
        .whiteCard {
            min-width: 40vmin;
            vertical-align: middle;
            background-color: white;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);
        }

        .dot {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            margin-right: 20px;
            display: inline-block;
        }

        .alert {
            position: absolute;
            left: 50%;
            bottom: 0%;
            width: 60%;
            transform: translate(-50%, -50%);
            z-index: 999;
        }

        .hero-body {
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 40%), url("https://www.atlantis.com/-/media/atlantis/dubai/atp/resort/exterior/AtlantisThePalm-Exterior-FrontShotWithRoyalPool.jpg?sc_lang=it");
            background-position: center bottom;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
            height: 20rem;
        }

        .row.has-text-centered.bottomLine {
            position: absolute;
            bottom: auto;
            left: 50%;
            top: 100%;
            transform: translate(-50%, -50%);
            margin: auto;
        }
    </style>

    <script>
        $(function () {
            $('.my-select').selectpicker(
                {dropupAuto: false}
            );
        });

        window.onload = function () {
            selectDays();
        };

        $(document).on("change", "#services", function () {
            selectDays();
        });

        function selectDays() {
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

            let fromInput = document.getElementById('fromValue').textContent;
            let fromDay = parseInt(fromInput.charAt(8) + fromInput.charAt(9));
            let fromMonth = parseInt(fromInput.charAt(5) + fromInput.charAt(6));

            let toInput = document.getElementById('toValue').textContent;
            let toDay = parseInt(toInput.charAt(8) + toInput.charAt(9));
            let toMonth = parseInt(toInput.charAt(5) + toInput.charAt(6));

            let days;
            if (toMonth === fromMonth) {
                days = toDay - fromDay;
            } else {
                switch (fromMonth) {
                    case 6:
                        days = (30 - fromDay) + toDay + 1;
                        break;

                    case 9:
                        days = (30 - fromDay) + toDay + 1;
                        break;

                    case 11:
                        days = (30 - fromDay) + toDay + 1;
                        break;

                    case 2:
                        let isLeep = new Date(new Date().getFullYear(), 1, 29).getDate() === 29;    //bisesitle o no
                        if (isLeep) {
                            days = (29 - fromDay) + toDay + 1;
                        } else {
                            days = (28 - fromDay) + toDay + 1;
                        }
                        break;

                    default:    //mesi 1 | 3 | 4 | 5 | 7 | 8 | 10 | 12
                        days = (31 - fromDay) + toDay + 1;
                        break;
                }
            }
            let k = 0;
            selected.forEach(function (option) {
                let fromDate = new Date(fromInput);

                $("#servicesContainer").append('<label>' +
                    option +
                    '</label>' +
                    '<br>');

                for (let i = days, j = 0; i > 0; i--, j++) {
                    $("#servicesContainer").append(
                        '<div class="form-check form-check-inline">' +
                        '<input class="form-check-input" type="checkbox" name="optionDays[' + k + '][' + j + ']" value="' + fromDate.getDate() + '" form="main-form">' +
                        '<label class="form-check-label" for="inlineCheckbox1">' + fromDate.getDate() + '</label>' +
                        '</div>');
                    fromDate.setDate(fromDate.getDate() + 1);
                }
                k++;

                $("#servicesContainer").append(
                    '<br>');
            })
        }
    </script>
@endsection


