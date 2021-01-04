@extends('layouts.admin-layout')

@section('content')

    <div class="row mx-auto my-auto">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New Service</h2>

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
                                Upload<input id="image" name="images[]" type="file"
                                             class="uploadFile @error('images') is-invalid @enderror img"
                                             value="Upload Image"
                                             accept="image/*"
                                             style="width: 0;height: 0;overflow: hidden;">
                            </label>
                            <i class="fa fa-times del"></i>
                        </div><!-- col-2 -->
                    </div><!-- row -->
                </div><!-- container -->
            </div>
        </div>

        <!--fine sezione immagini-->



    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="row mx-auto my-5">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Price:</strong>

                    <input type="number" class="form-control" value="{{ old('price') }}" name="price"
                           placeholder="Price">

                </div>

            </div>

            <div class="col-xs-2 col-sm-2 col-md-2 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>


            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                <a class="btn btn-primary" href="{{ route('services.index') }}"> Back</a>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="{{ asset('css/imgUploaderStyle.css') }}" rel="stylesheet">
    <script src="{{asset('js/dynamicImageUpload.js')}}"></script>

@endsection
