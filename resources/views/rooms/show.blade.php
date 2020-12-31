@extends('layouts.mainlayout')

@section('content')

    <div class="bootstrap-iso">
        <div class="container-fluid">
            <!-- Inizio sezione immagini e ricerca -->
            <div class="row">
                <!-- Inizio sezione  ricerca -->
                <div class="col-sm-3 my-2 mx-5">
                    <h1 class="text-center">Search</h1>
                    <div class="my-4 bg-warning rounded">
                        <div class="card-body">
                            <form method="GET" action="{{ route('rooms.index') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="startDate">Start Date: </label>
                                    <input id="startDate" type="date"
                                           class="form-control @error('date') is-invalid @enderror" name="email"
                                           value="{{ old('date') }}" min="<?php echo date('Y-m-d'); ?>"
                                           max="2030-12-31"/>
                                    <label for="endDate">End Date: </label>
                                    <input id="endDate" type="date"
                                           class="form-control @error('date') is-invalid @enderror" name="email"
                                           value="{{ old('date') }}" min="<?php echo date('Y-m-d'); ?>"
                                           max="2030-12-31"/>

                                    <div class="row">
                                        <div class="col my-2">
                                            <label class="control-label " for="select">
                                                N° of people
                                            </label>
                                        </div>
                                        <div class="col my-2">
                                            <label class="control-label" for="select">
                                                N° of rooms
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <select class="select form-control" id="select" name="select">
                                                <option value="1">
                                                    1
                                                </option>
                                                <option value="2">
                                                    2
                                                </option>
                                                <option value="3">
                                                    3
                                                </option>
                                                <option value="4">
                                                    4
                                                </option>
                                                <option value="5">
                                                    5
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="select form-control" id="select" name="select">
                                                <option value="1">
                                                    1
                                                </option>
                                                <option value="2">
                                                    2
                                                </option>
                                                <option value="3">
                                                    3
                                                </option>
                                                <option value="4">
                                                    4
                                                </option>
                                                <option value="5">
                                                    5
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase text-center"
                                        type="submit">
                                    SEARCH
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Inizio sezione  Immagini -->
                <div class="col-sm-4 my-2 mx-3 ">
                    <div class="row d-flex justify-content-center">
                        <h1 class="text-center">Gallery</h1>
                    </div>
                    <div class="row my-3 d-flex justify-content-center">
                        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php $i = 0;?>
                                @foreach ($room->images as $image)
                                <?php if ($i == 0) {
                                    $set_ = 'active';
                                } else {
                                    $set_ = '';
                                } ?>
                                <li data-target="#carouselIndicators" data-slide-to="{{$i}}"
                                    class="{{$set_}}"></li>
                                <?php $i++;?>
                                @endforeach
                            </ol>

                            <div class='carousel-inner' style=" width:100%; height: 23em; !important;" >

                                <?php $i = 0;?>
                                @foreach ($room->images as $image)
                                <?php if ($i == 0) {
                                    $set_ = 'active';
                                } else {
                                    $set_ = '';
                                } ?>
                                <div class='carousel-item  <?php echo $set_; ?>'>
                                    <img src="/images/{{$image->path}}" class='d-block img-responsive' alt="" style="margin: auto">
                                </div>
                                <?php $i++;?>
                                @endforeach

                            </div>

                            <a class="carousel-control-prev" href="#carouselIndicators" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselIndicators" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 my-2 mx-5">
                    <h1 class="text-center">Informations</h1>
                    <div class="bg-warning rounded my-4">
                        <div class="card-body">
                            <div class="info-group">
                                <div class="bg-light rounded my-1 ">
                                    <div class="card-body">
                                        <h5 class="my-1">Room Type: {{$room->type}}</h5>

                                        <h5 class="my-3">For max {{$room->capacity}} people</h5>

                                        <h5 class="my-3">Availability:
                                            @if($room->availability == 1)
                                                <span class="dot" style="background-color: green"></span>
                                            @else
                                                <span class="dot" style="background-color: red"></span>
                                            @endif
                                        </h5>
                                        <h5 class="my-3">Price: {{$room->price}}€</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-5">
                <div class="bg-warning rounded my-3 " style="width: 100rem;">
                    <div class="card-body">
                        <div class="info-group">
                            <div class=" bg-light rounded my-1">
                                <div class="card-body">
                                    <h5 class="text-center">Description</h5>
                                    <p>{{$room->description}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fine sezione immagini e ricerca -->

    <style>
        .carousel-control-next, .carousel-control-prev, .carousel-indicators {
            /* cambia il colore degli indicatori del carosello in nero */
            filter: invert(100%);
        }

        .dot {
            height: 15px;
            width: 15px;
            border-radius: 50%;
            display: inline-block;
        }
    </style>
@endsection
