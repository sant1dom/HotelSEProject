@extends('layouts.mainlayout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h4 class="title text-light font-weight-bold" style="font-size:4vw;">
                    Our rooms
                </h4>
            </div>
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
                                   value="{{ old('date') }}" min="<?php echo date('Y-m-d'); ?>"
                                   max="2030-12-31"/>
                        </div>
                        <div class="col-sm-3 float-left" style="margin: auto">
                            <label for="endDate">Check-out</label>
                            <input id="endDate" type="date"
                                   class="form-control @error('date') is-invalid @enderror" name="endDate"
                                   value="{{ old('date') }}" min="<?php echo date('Y-m-d'); ?>"
                                   max="2030-12-31"/>
                        </div>
                        <div class="col-sm-3 float-left" style="margin: auto">
                            <label for="typeSelection">Type</label>
                            <select id="typeSelection" class="form-control" name="typeSelection">
                                <option>
                                    None
                                </option>
                                @if($types)
                                    @foreach($types as $type)
                                        <option>
                                            {{$type->type}}
                                        </option>
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
                    <form method="GET" action="{{route('bookings.create')}}">
                        <input name="userIndexRoomId" type="hidden" value="{{$room->id}}">
                        <div class="row d-flex justify-content-center"
                             style="background-color: white; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);">
                            <div class="col-sm has-text-centered roomImage"
                                 style="margin: 2rem; vertical-align: middle;">
                                <div id="carouselIndicators{{$j}}" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php $i = 0;?>
                                        @foreach ($room->images as $image)
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
                                        @foreach ($room->images as $image)
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
                            <div class="col-sm has-text-centered" style="margin: 2rem;">
                                <h1>{{$room->type}}</h1>
                                <br>
                                <p>{{$room->description}}</p>
                                <br>
                                <div class="row has-text-centered bottomLine">
                                    <p>For max {{$room->capacity}} people. Price per person: {{$room->price}}€
                                        <button class="btn shadow-none" type="submit"><h5>Get this room!</h5></button>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <form method="GET" action="{{route('bookings.create')}}">
                        <input name="userIndexRoomId" type="hidden" value="{{$room->id}}">
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm has-text-centered" style="margin: 2rem;">
                                <h1>{{$room->type}}</h1>
                                <br>
                                <p>{{$room->description}}</p>
                                <br>
                                <div class="row has-text-centered bottomLine">
                                    <p>For max {{$room->capacity}} people. Price per person: {{$room->price}}€
                                        <button class="btn shadow-none" type="submit"><h5>Get this room!</h5></button>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm has-text-centered roomImage"
                                 style="margin: 2rem; vertical-align: middle;">
                                <div id="carouselIndicators{{$j}}" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php $i = 0;?>
                                        @foreach ($room->images as $image)
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
                                        @foreach ($room->images as $image)
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

    <style>
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
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection

