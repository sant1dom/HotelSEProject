@extends('layouts.mainlayout')

@section('content')

    <script type="text/javascript" src="{{ URL::asset('js/dynamicForm.js') }}"></script>

    <div class="bootstrap-iso">
        <div class="container-fluid">
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
                                        CIAO
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

    <style>
        .bg-secondary {
            background-color: #c2c2a3 !important;
        }

        .bg-transparent {
            background-color: #8a8a5c !important;
        }

    </style>
    <script>
        document.getElementById("CloneNode_0").style.display = 'none';
        document.getElementById("CloneNode_1").style.display = 'none';
    </script>
@endsection
