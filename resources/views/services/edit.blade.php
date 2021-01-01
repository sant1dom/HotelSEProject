@extends('layouts.mainlayout')
@section('content')

    <div class="row mx-auto">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Edit service</h2>
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



    <form action="{{ route('services.update',$service->id) }}" method="POST">

        @csrf

        @method('PUT')



        <div class="row mx-auto">

            <div class="col-xs-12x col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" value="{{ $service->name }}" class="form-control" placeholder="Name">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Price:</strong>

                    <input type="number" class="form-control" name="price" value="{{ $service->price }}" placeholder="Price"></input>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Availability:</strong>
                    <br>
                    <input type="radio" name="availability" value="0"  {{ ($service->availability=="0")? "checked" : "" }} > Not Available</label>
                    <br>
                    <input type="radio" name="availability" value="1"  {{ ($service->availability=="1")? "checked" : "" }} > Available</label>
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>



    </form>

@endsection
