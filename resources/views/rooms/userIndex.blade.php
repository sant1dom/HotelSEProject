@extends('layouts.mainlayout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h4 class="title text-light font-weight-bold" style="font-size:4vw;">
                    Our rooms
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
        <div class="border border-warning rounded" id="searchBar">
            <div class="card-body">
                <form method="GET" action="{{route('rooms.userIndex')}}" role="search">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3 float-left" style="margin: auto">
                            <label for="startDate">Check-in</label>
                            <input id="startDate" type="date"
                                   class="form-control @error('date') is-invalid @enderror" name="startDate"
                                   @if(isset($from))
                                   value="{{$from}}"
                                   @else
                                   value="{{ old('startDate') }}"
                                   @endif
                                   min="<?php echo date('Y-m-d'); ?>"
                                   max="2030-12-31"/>
                        </div>
                        <div class="col-sm-3 float-left" style="margin: auto">
                            <label for="endDate">Check-out</label>
                            <input id="endDate" type="date"
                                   class="form-control @error('date') is-invalid @enderror" name="endDate"
                                   @if(isset($to))
                                   value="{{$to}}"
                                   @else
                                   value="{{ old('endDate') }}"
                                   disabled
                                   @endif
                                   min="<?php echo date('Y-m-d'); ?>"
                                   max="2030-12-31"/>
                        </div>
                        <div class="col-sm-3 float-left" style="margin: auto">
                            <label for="typeSelection">Room name</label>
                            <select id="typeSelection" class="form-control" name="typeSelection">
                                <option>
                                    None
                                </option>
                                @if($roomsTypes)
                                    @foreach($roomsTypes as $RoomsType)
                                        @if(isset($selectedType) && $RoomsType->type == $selectedType)
                                            <option selected>
                                                {{$RoomsType->type}}
                                            </option>
                                        @else
                                            <option>
                                                {{$RoomsType->type}}
                                            </option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-3 float-right" style="margin-top: 2.5%">
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
    <div class="margin"></div>
    <div class="bootstrap-iso">
        @if($rooms)
            @foreach($rooms as $j => $room)
                @if($j % 2 == 0)
                    <form method="GET" action="{{route('bookings.stepOne')}}">
                        <input name="userIndexRoomId" type="hidden" value="{{$room->id}}">
                        <input name="from" id="startDate_input" type="hidden" value="">
                        <input name="to" id="endDate_input" type="hidden" value="">
                        <div class="row" style="background-color: white; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);">
                            <div class="col-sm has-text-centered roomImage"
                                 style="margin: 2rem; vertical-align: middle;">
                                <div id="carouselIndicators{{$j}}" class="carousel slide" data-interval="false" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php $i = 0;?>
                                        @foreach ($room->imageRooms as $image)
                                            <?php if ($i == 0) {
                                                $set_ = 'active';
                                            } else {
                                                $set_ = '';
                                            } ?>
                                            <li data-target="#carouselIndicators{{$j}}" data-slide-to="{{$i}}"
                                                class="{{$set_}}"></li>
                                            <?php $i++;?>
                                        @endforeach
                                    </ol>
                                    <div class='carousel-inner'>
                                        <?php $i = 0;?>
                                        @foreach ($room->imageRooms as $image)
                                            <?php if ($i == 0) {
                                                $set_ = 'active';
                                            } else {
                                                $set_ = '';
                                            } ?>
                                            <div class='carousel-item  <?php echo $set_; ?>'>
                                                <img src="/storage/{{$image->path}}" class='imageRoom' alt=""
                                                     style="margin: auto; object-fit: contain;">
                                            </div>
                                            <?php $i++;?>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselIndicators{{$j}}" role="button"
                                       data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselIndicators{{$j}}" role="button"
                                       data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm" style="margin: 2rem; text-align: left">
                                <div>
                                    <h1>{{$room->type}}</h1>
                                </div>
                                <br>
                                <div>
                                    <p>{{$room->description}}</p>
                                </div>
                                <br>
                                <div>
                                    <p>For max {{$room->capacity}} people. Price per person: {{$room->price}}€</p>
                                    <button class="btn btn-outline-secondary shadow-sm rounded-pill" type="submit">
                                        <h5>Get this room!</h5>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <form method="GET" action="{{route('bookings.stepOne')}}">
                        <input name="userIndexRoomId" type="hidden" value="{{$room->id}}">
                        <input name="from" id="startDate_input" type="hidden">
                        <input name="to" id="endDate_input" type="hidden">
                        <div class="row">
                            <div class="col-sm" style="margin: 2rem; text-align: right">
                                <div>
                                    <h1>{{$room->type}}</h1>
                                </div>
                                <br>
                                <div>
                                    <p>{{$room->description}}</p>
                                </div>
                                <br>
                                <div>
                                    <p>For max {{$room->capacity}} people. Price per person: {{$room->price}}€</p>
                                    <button class="btn btn-outline-secondary shadow-sm rounded-pill" type="submit">
                                        <h5>Get this room!</h5>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm has-text-centered roomImage"
                                 style="margin: 2rem; vertical-align: middle;">
                                <div id="carouselIndicators{{$j}}" class="carousel slide" data-interval="false" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php $i = 0;?>
                                        @foreach ($room->imageRooms as $image)
                                            <?php if ($i == 0) {
                                                $set_ = 'active';
                                            } else {
                                                $set_ = '';
                                            } ?>
                                            <li data-target="#carouselIndicators{{$j}}" data-slide-to="{{$i}}"
                                                class="{{$set_}}"></li>
                                            <?php $i++;?>
                                        @endforeach
                                    </ol>
                                    <div class='carousel-inner'>
                                        <?php $i = 0;?>
                                        @foreach ($room->imageRooms as $image)
                                            <?php if ($i == 0) {
                                                $set_ = 'active';
                                            } else {
                                                $set_ = '';
                                            } ?>
                                            <div class='carousel-item  <?php echo $set_; ?>'>
                                                <img src="/storage/{{$image->path}}" class='imageRoom img-responsive'
                                                     alt=""
                                                     style="margin: auto;">
                                            </div>
                                            <?php $i++;?>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselIndicators{{$j}}" role="button"
                                       data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselIndicators{{$j}}" role="button"
                                       data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            @endforeach
        @endif
        <br>
    </div>

    <script>
        window.onload = function () {
            let minDate = $('#startDate').val();
            $("#startDate_input").attr("value", minDate);
            let endDate = $('#endDate').val();
            $("#endDate_input").attr("value", endDate);
        };

        $('#startDate').change(function () {
            let minDate = $('#startDate').val();
            $('#endDate').prop("disabled", false);
            $("#endDate").attr("min", minDate);
            $("#startDate_input").attr("value", minDate);
        });

        $('#endDate').change(function () {
            let endDate = $('#endDate').val();
            $("#endDate_input").attr("value", endDate);
        });
    </script>

    <style>
        .alert {
            position: absolute;
            left: 50%;
            bottom: 0%;
            width: 60%;
            transform: translate(-50%, -50%);
            z-index: 999;
        }

        .margin {
            height: 10rem;
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

        .imageRoom {
            width: 70%;
            height: 100%;
            transition: .5s ease;
            backface-visibility: hidden;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            box-shadow: 0 -3px 6px 2px rgba(0, 0, 0, 0.2);
        }

        .col-sm.has-text-centered.roomImage {
            position: relative;
            width: 50%;
        }

        .carousel-control-next, .carousel-control-prev, .carousel-indicators {
            /* cambia il colore degli indicatori del carosello in nero */
            filter: invert(100%);
        }
    </style>
@endsection

