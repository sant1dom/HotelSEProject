@extends('layouts.mainlayout')

@section('content')

    <script type="text/javascript" src="{{ URL::asset('js/dynamicForm.js') }}"></script>

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
                                    SUBMIT
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Inizio sezione  Immagini -->
                <div class="col-sm-7 my-2 mx-3">
                    <div class="row d-flex justify-content-center">
                        <h1 class="text-center">Gallery</h1>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div id="carouselExampleIndicators" class="carousel slide  w-50 p-5" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php $i = 0;?>
                                @foreach ($room->images as $image):
                                <?php if ($i == 0) {
                                    $set_ = 'active';
                                } else {
                                    $set_ = '';
                                } ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"
                                    class="{{$set_}}"></li>
                                <?php $i++;?>
                                @endforeach
                            </ol>
                            <div class='carousel-inner'>
                                <?php $i = 0;?>
                                @foreach ($room->images as $image):
                                <?php if ($i == 0) {
                                    $set_ = 'active';
                                } else {
                                    $set_ = '';
                                } ?>
                                <div class='carousel-item <?php echo $set_; ?>'>
                                    <img src='{{$image->path}}' class='d-block w-100 img-responsive' alt="">
                                </div>
                                <?php $i++;?>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fine sezione immagini e ricerca -->
            <div class="separator"><h1 class="title is-1 has-text-centered">Informations</h1></div>
            <!-- Inizio sezione Informazioni -->
            <div class="row d-flex justify-content-center">
                <!-- Inizio Descrizione -->
                <div class="col-sm-5 my-2 mx-5">
                    <h1 class="text-center">Description</h1>
                    <div class="my-4 bg-secondary rounded">
                        <div class="card-body">
                            <p>
                                Donec leo. Vivamus fermentum nibh in augue. Praesent a lacus at urna congue rutrum.
                                Nulla
                                enim eros, porttitor eu, tempus id, varius non, nibh. Duis enim nulla, luctus eu,
                                dapibus
                                lacinia, venenatis id, quam. Vestibulum imperdiet, magna nec eleifend rutrum, nunc
                                lectus
                                vestibulum velit, euismod lacinia quam nisl id lorem. Quisque erat. Vestibulum
                                pellentesque,
                                justo mollis pretium suscipit, justo nulla blandit libero, in blandit augue justo quis
                                nisl.
                                Fusce mattis viverra elit.</p>
                            <p>Praesent a lacus at urna congue rutrum. Nulla enim eros, porttitor eu, tempus id, varius
                                non,
                                nibh. Duis enim nulla, luctus eu, dapibus lacinia, venenatis id, quam. Vestibulum
                                imperdiet,
                                magna nec eleifend rutrum, nunc lectus vestibulum velit, euismod lacinia quam nisl id
                                lorem.
                                Quisque erat. Vestibulum pellentesque, justo mollis pretium suscipit, justo nulla
                                blandit
                                libero, in blandit augue justo quis nisl. Fusce mattis viverra elit. Fusce quis tortor.
                                Consectetuer adipiscing elit. Nam pede erat, porta eu, lobortis eget, tempus et, tellus.
                                Etiam neque. Vivamus consequat lorem at nisl. Nullam non wisi a sem semper eleifend.
                                Curabitur sit amet nulla. Donec leo. Vivamus fermentum nibh in augue. Nam in massa. Sed
                                vel
                                tellus. Curabitur sem urna, consequat vel, suscipit in, mattis placerat, nulla. Sed ac
                                leo.
                                Pellentesque imperdiet.</p>
                        </div>
                    </div>
                </div>
                <!-- Fine Descrizione -->

                <!-- Inizio Prenotazione -->
                <div class="col-sm-5 my-2 mx-5">
                    <h1 class="text-center">Prenotation</h1>
                    <div class="my-4 bg-secondary rounded">
                        <div class="card-body">
                            <form method="POST" action="">
                                @csrf
                                <div class="separator"><h4 class=" has-text-centered">Date</h4></div>
                                <div class="bg-transparent rounded">
                                    <div class="card-body">
                                        <div class="form-group">
                                                SO CHE è UNA MERDA PER FAVORE NON GIUDICATEMI, CI STO PROVANDO... :'(
                                        </div>
                                    </div>
                                </div>
                                <div class="separator"><h4 class=" has-text-centered">Guests</h4></div>
                                <div class="bg-transparent rounded">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg fa fa-plus shadow-none"
                                                    onClick="addFormFun(0)">
                                            </button>
                                            <button type="button" class="btn btn-lg fa fa-minus shadow-none"
                                                    onClick="removeFormFun(0)">
                                            </button>

                                            <div class="CloneNode_0 mx-2" id="CloneNode_0">
                                                <div class="separator"><h4 class=" has-text-centered">~</h4></div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label for="name">First name:</label>
                                                    </div>
                                                    <div class="col d-flex justify-content-center">
                                                        <input class="" type="text" id="name" name="name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label for="lastname">Last name:</label>
                                                    </div>
                                                    <div class="col d-flex justify-content-center">
                                                        <input class="" type="text" id="lastname" name="lastname">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label for="doctype">Document type:</label>
                                                    </div>
                                                    <div class="col d-flex justify-content-center">
                                                        <input class="" type="text" id="doctype" name="doctype">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label for="docnum">Document number:</label>
                                                    </div>
                                                    <div class="col d-flex justify-content-center">
                                                        <input class="" type="text" id="docnum" name="docnum">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label for="birthdate">Birth date:</label>
                                                    </div>
                                                    <div class="col d-flex justify-content-center">
                                                        <input class="" type="date" id="birthdate" name="birthdate"
                                                               max="<?php echo date('Y-m-d'); ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p id="BottomLine_0" class="BottomLine_0"></p>

                                    </div>
                                </div>
                                <div class="separator"><h4 class=" has-text-centered">Services</h4></div>
                                <div class="bg-transparent rounded">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-lg fa fa-plus shadow-none"
                                                onClick="addFormFun(1)">
                                        </button>
                                        <button type="button" class="btn btn-lg fa fa-minus shadow-none"
                                                onClick="removeFormFun(1)">
                                        </button>

                                        <div class="CloneNode_1 mx-2" id="CloneNode_1">
                                            <div class="separator"><h4 class=" has-text-centered">~</h4></div>
                                            <div class="row">
                                                <div class="col ">
                                                    <label for="checkboxes" class="my-3">Select a service</label><select
                                                        class="custom-select" id="checkboxes">
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-center">
                                                            <label for="startDateService">Start Date:</label>
                                                        </div>
                                                        <div class="col d-flex justify-content-center">
                                                            <input type="date" id="startDateService"
                                                                   name="startDateService"
                                                                   min="<?php echo date('Y-m-d'); ?>" max="2030-12-31"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-center">
                                                            <label for="endDateService">End Date:</label>
                                                        </div>
                                                        <div class="col d-flex justify-content-center">
                                                            <input type="date" id="endDateService"
                                                                   name="endDateService"
                                                                   min="<?php echo date('Y-m-d'); ?>" max="2030-12-31"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p id="BottomLine_1" class="BottomLine_1"></p>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase text-center my-4"
                                        type="submit">
                                    SUBMIT
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fine Prenotazione -->
        </div>
        <!-- Fine sezione Informazioni -->
    </div>

    <style>
        .bg-secondary {
            background-color: #c2c2a3 !important;
        }

        .bg-transparent {
            background-color: #8a8a5c !important;
        }

        .carousel-control-next, .carousel-control-prev, .carousel-indicators {
            /* cambia il colore degli indicatori del carosello in nero */
            filter: invert(100%);
        }
    </style>
    <script>
        document.getElementById("CloneNode_0").style.display = 'none';
        document.getElementById("CloneNode_1").style.display = 'none';
    </script>
@endsection
