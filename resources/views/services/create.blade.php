@extends('layouts.admin-layout')

@section('content')

    <div class="row mx-auto my-auto">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New Service</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('services.index') }}"> Back</a>

            </div>

        </div>

    </div>



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
        <div class="row mx-auto my-auto">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ old('name') }}"class="form-control" placeholder="Name">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Price:</strong>

                    <input type="number" class="form-control" value="{{ old('price') }}" name="price" placeholder="Price"></input>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>
    </form>

@endsection
