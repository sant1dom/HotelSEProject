@extends('layouts.mainlayout')

@section('content')
    <div class="bootstrap-iso">
        <div class="container-fluid">
            <form method="POST" action="{{ route('rooms.store') }}">
                @csrf
                <div class="row">
                    <!-- Inizio sezione informazioni -->
                    <div class="col-sm-3 my-2 mx-5 h-75">
                        <h1 class="text-center">Informations</h1>
                        <div class="my-4 bg-warning rounded h-75">
                            <div class="card-body">

                                @csrf
                                <div class="form-group">

                                    <label class="control-label" for="type">
                                        Room Type:
                                    </label>
                                    <input class="form-control" id="type" name="type" type="text"/>

                                    <label class="control-label my-1" for="capacity">
                                        Max people:
                                    </label>
                                    <input class="form-control" id="capacity" name="capacity" type="text"/>


                                    <div class="row">
                                        <div class="col my-2 d-flex">
                                            <label class="bottom_aligner my-1" for="price">
                                                Price:
                                            </label>
                                        </div>
                                        <div class="col my-2 d-flex">
                                            <label class="bottom_aligner my-1" for="availability">
                                                Available:
                                            </label>
                                        </div>
                                        <div class="col my-2 d-flex justify-content-center">
                                            <label class="bottom_aligner my-1" for="numroom">
                                                Room number:
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input class="form-control" id="price" name="price" type="text"/>
                                        </div>
                                        <div class="col my-1 d-flex justify-content-center">
                                            <input class="" id="availability" name="availability" type="checkbox"
                                                   checked
                                                   data-toggle="toggle" data-style="ios"
                                                   data-on="Yes" data-off="No" data-onstyle="success"
                                                   data-offstyle="danger">
                                        </div>
                                        <div class="col">
                                            <input class="form-control" id="numroom" name="numroom" type="text"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Inizio sezione  Immagini -->
                    <div class="col-sm-4 my-2 mx-3">
                        <div class="row d-flex justify-content-center">
                            <h1 class="text-center">Gallery </h1>
                            <i class="fa fa-plus imgAdd"></i>
                        </div>
                        <div class="row my-3 d-flex justify-content-center">
                            <div class="container">
                                <div class="row d-flex justify-content-center" id="imageContainer">
                                        <div class="col-sm-6 imgUp ">
                                            <div class="imagePreview"></div>
                                            <label class="btn btn-primary">
                                                Upload<input id="image" name="image" type="file" class="uploadFile img" value="Upload Photo"
                                                             style="width: 0;height: 0;overflow: hidden;">
                                            </label>
                                            <i class="fa fa-times del"></i>
                                        </div><!-- col-2 -->
                                </div><!-- row -->
                            </div><!-- container -->
                        </div>
                    </div>
                    <div class="col-sm-3 my-2 mx-5 h-75">
                        <h1 class="text-center">Description</h1>
                        <div class="bg-warning rounded my-3 h-75">
                            <div class="card-body">
                                <div class=" bg-light rounded my-1">
                                    <div class="card-body">
                                        <label class="control-label" for="description">
                                            Description of the room:
                                        </label>
                                        <textarea class="form-control " id="description" name="description" rows="7"
                                                  style="resize: none"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <button class="btn btn-lg btn-primary btn-block text-uppercase text-center rounded"
                                    type="submit">
                                SUBMIT
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <link href="{{ asset('css/imgUploaderStyle.css') }}" rel="stylesheet">
    <script src="{{asset('js/dynamicImageUpload.js')}}"></script>

    <style>
        .toggle.ios, .toggle-on.ios, .toggle-off.ios {
            border-radius: 20px;
        }

        .bottom_aligner {
            display: flex;
            align-items: flex-end;
        }
    </style>
@endsection
