@extends('layouts.admin-layout')

@section('content')

    <div class="row mx-auto my-auto">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New Contact</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>

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



    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="row mx-auto my-auto">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Type:</strong>
                    <br>
                    <input type="radio" name="type" value="social"> Social</label>
                    <br>
                    <input type="radio" name="type" value="email"> Email</label>
                    <br>
                    <input type="radio" name="type" value="address"> Address</label>
                    <br>
                    <input type="radio" name="type" value="phone"> Phone</label>
                    <br>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Contact String:</strong>

                    <input type="text" class="form-control" name="contact_string"></input>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>
    </form>

@endsection
