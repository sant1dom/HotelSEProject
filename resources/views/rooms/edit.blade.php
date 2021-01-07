@extends('layouts.admin-layout')

@section('content')

    <div class="bootstrap-iso" xmlns="http://www.w3.org/1999/html">
        <div class="container-fluid">
            <form method="POST" action="{{ route('rooms.update',$room->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Inizio sezione informazioni -->
                    <div class="col-sm-3 my-2 mx-5 h-75">
                        <h1 class="text-center">Informations</h1>
                        <div class="my-4 bg-warning rounded h-75">
                            <div class="card-body">

                                <div class="form-group">

                                    <label class="control-label" for="type">
                                        Room Type:
                                    </label>

                                    <input class="form-control @error('type') is-invalid @enderror" id="type"
                                           name="type" type="text" placeholder="Ex.: Luxury" value="{{$room->type}}"/>


                                    <label class="control-label my-1" for="capacity">
                                        Max people:
                                    </label>
                                    <input class="form-control @error('capacity') is-invalid @enderror" id="capacity"
                                           name="capacity" type="number"
                                           placeholder="Ex.: 4" value="{{$room->capacity}}" min="0"/>

                                    <div class="row">
                                        <div class="col my-2 d-flex">
                                            <label class="bottom_aligner my-1" for="price">
                                                Price:
                                            </label>
                                        </div>
                                        <div class="col my-2 d-flex justify-content-center">
                                            <label class="bottom_aligner my-1 " for="availability">
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
                                            <input class="form-control @error('price') is-invalid @enderror" id="price"
                                                   name="price" type="number" value="{{$room->price}}" min="0"/>
                                        </div>


                                        <div class="col my-1 d-flex justify-content-center">
                                            <input class="" id="availability" name="availability" type="checkbox"
                                                   @if($room->availability===1)
                                                   checked
                                                   @endif
                                                   data-toggle="toggle" data-style="ios"
                                                   data-on="Yes" data-off="No" data-onstyle="success"
                                                   data-offstyle="danger">
                                        </div>
                                        <div class="col">
                                            <input class="form-control @error('numroom') is-invalid @enderror"
                                                   id="numroom" name="numroom" type="text" value="{{$room->numroom}}"
                                                   min="0"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-1 d-flex justify-content-center">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
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
                                    @foreach($room->images as $image)
                                        <div class="col-sm-6 imgUp ">
                                            <div class="imagePreviewEdit"
                                                 style="background-image: URL('/storage/{{$image->path}}');">
                                            </div>
                                            <i class="fa fa-times del"></i>
                                        </div><!-- col-2 -->
                                    @endforeach
                                </div><!-- row -->
                            </div><!-- container -->
                        </div>
                    </div>
                    <!--fine sezione immagini-->


                    <div class="col-sm-3 my-2 mx-5 h-75">
                        <h1 class="text-center">Description</h1>
                        <div class="bg-warning rounded my-3 h-75">
                            <div class="card-body">
                                <div class=" bg-light rounded my-1">
                                    <div class="card-body">
                                        <label class="control-label" for="description">
                                            Description of the room:
                                        </label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                                  id="description" name="description" rows="7"
                                                  style="resize: none"
                                                  placeholder="Put a description of the room here...">{{$room->description}}</textarea>
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
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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

        .imagePreviewEdit {
            width: 100%;
            height: 180px;
            background-position: center;
            background-color: #fff;
            background-size: cover;
            background-repeat: no-repeat;

            display: inline-block;
            box-shadow: 0 -3px 6px 2px rgba(0, 0, 0, 0.2);
        }
    </style>

@endsection

