@extends('layouts.mainlayout')

@section('content')
    <div class="bootstrap-iso">
        <div class="container-fluid">
            <form method="POST" action="{{ route('bookings.confirmation') }}">
                <div class="form-group">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4 my-2 mx-5">
                            <h1 class="text-center">Days of stay</h1>
                            <div class="my-4 bg-warning rounded h-75">
                                <div class="card-body">
                                    <label for="startDate">Start Date: </label>
                                    <input id="startDate" type="date"
                                           class="form-control @error('date') is-invalid @enderror" name="email"
                                           value="{{ old('date') }}"
                                           min="<?php use App\Models\Image;use App\Models\Room;echo date('Y-m-d'); ?>"
                                           max="2030-12-31"/>
                                    <label for="endDate">End Date: </label>
                                    <input id="endDate" type="date"
                                           class="form-control @error('date') is-invalid @enderror" name="email"
                                           value="{{ old('date') }}" min="<?php echo date('Y-m-d'); ?>"
                                           max="2030-12-31"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7 my-2 mx-4 ">
                            <h1 class="text-center">Select a room</h1>
                            <div class="my-4 bg-warning rounded h-75">
                                <div class="card-body h-100">
                                    <div class="row h-100">
                                        @if($rooms)
                                            <div class="col-sm-4">
                                                <label for="ourRooms">Our rooms: </label>
                                                <select class="form-control" id="ourRooms" name="ourRooms"
                                                        onselect="selectShow()">
                                                    @foreach($rooms as $room)
                                                        <option>
                                                            {{$room->type}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-8 ">
                                                <div class="bg-light rounded h-100">
                                                    <div class="card-body">

                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <h4>Sorry, no rooms available now...</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-5">
                        <script type="text/javascript" src="{{URL::asset('js/dynamicForm.js') }}"></script>

                        <!-- Inizio Prenotazione -->
                        <div class="col-sm-4 my-2 mx-5">
                            <h1 class="text-center">Guests and services:</h1>
                            <div class="my-4 bg-warning rounded">
                                <div class="card-body">
                                    <div class="separator"><h4 class=" has-text-centered">Guests</h4></div>
                                    <div class="bg-light rounded">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <button type="button"
                                                        class="btn btn-lg fa fa-plus shadow-none"
                                                        onClick="addFormFun(0)">
                                                </button>
                                                <button type="button"
                                                        class="btn btn-lg fa fa-minus shadow-none"
                                                        onClick="removeFormFun(0)">
                                                </button>


                                                <div class="separator"><h4 class=" has-text-centered">
                                                        ~</h4></div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label>Name:</label>
                                                    </div>
                                                    <div class="col">
                                                        <label>{{Auth::user()->name}}</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label>Last name:</label>
                                                    </div>
                                                    <div class="col">
                                                        <label> da aggiungere </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label>Document type:</label>
                                                    </div>
                                                    <div class="col">
                                                        <label> da aggiungere </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label>Document number:</label>
                                                    </div>
                                                    <div class="col">
                                                        <label> da aggiungere </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label>Birth date:</label>
                                                    </div>
                                                    <div class="col">
                                                        <label> da aggiungere </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="CloneNode_0 mx-2" id="CloneNode_0">
                                                <div class="separator"><h4 class=" has-text-centered">
                                                        ~</h4></div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label for="name">First name:</label>
                                                    </div>
                                                    <div class="col d-flex justify-content-center">
                                                        <input class="form-control" type="text" id="name"
                                                               name="name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label for="lastname">Last name:</label>
                                                    </div>
                                                    <div class="col d-flex justify-content-center">
                                                        <input class="form-control" type="text" id="lastname"
                                                               name="lastname">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label for="doctype">Document type:</label>
                                                    </div>
                                                    <div class="col d-flex justify-content-center">
                                                        <input class="form-control" type="text" id="doctype"
                                                               name="doctype">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label for="docnum">Document number:</label>
                                                    </div>
                                                    <div class="col d-flex justify-content-center">
                                                        <input class="form-control" type="text" id="docnum"
                                                               name="docnum">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <label for="birthdate">Birth date:</label>
                                                    </div>
                                                    <div class="col d-flex justify-content-center">
                                                        <input class="form-control" type="date" id="birthdate"
                                                               name="birthdate"
                                                               max="<?php echo date('Y-m-d'); ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p id="BottomLine_0" class="BottomLine_0"></p>
                                        <button
                                            class="btn btn-lg btn-primary btn-block text-uppercase text-center my-4"
                                            type="button">
                                            Add to your guests
                                        </button>
                                    </div>
                                </div>
                                <div class="separator"><h4 class=" has-text-centered">Services</h4>
                                </div>
                                <div class="bg-warning rounded">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-lg fa fa-plus shadow-none"
                                                onClick="addFormFun(1)">
                                        </button>
                                        <button type="button" class="btn btn-lg fa fa-minus shadow-none"
                                                onClick="removeFormFun(1)">
                                        </button>

                                        <div class="CloneNode_1 mx-2" id="CloneNode_1">
                                            <div class="separator"><h4 class=" has-text-centered">~</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col ">
                                                    <label for="checkboxes" class="my-3">Select a
                                                        service</label><select
                                                        class="custom-select" id="checkboxes">
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-center">
                                                            <label for="startDateService">Start
                                                                Date:</label>
                                                        </div>
                                                        <div class="col d-flex justify-content-center">
                                                            <input type="date" id="startDateService"
                                                                   name="startDateService"
                                                                   min="<?php echo date('Y-m-d'); ?>"
                                                                   max="2030-12-31"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-center">
                                                            <label for="endDateService">End
                                                                Date:</label>
                                                        </div>
                                                        <div class="col d-flex justify-content-center">
                                                            <input type="date" id="endDateService"
                                                                   name="endDateService"
                                                                   min="<?php echo date('Y-m-d'); ?>"
                                                                   max="2030-12-31"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p id="BottomLine_1" class="BottomLine_1"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        document.getElementById("CloneNode_0").style.display = 'none';
        document.getElementById("CloneNode_1").style.display = 'none';
    </script>
@endsection
