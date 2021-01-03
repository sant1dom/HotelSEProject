@extends('layouts.admin-layout')
@section('content')

    <div class="row mx-auto">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Edit contact</h2>
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



    <form action="{{ route('contacts.update',$contact->id) }}" method="POST">

        @csrf

        @method('PUT')


        <div class="row mx-auto">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Type:</strong>
                    <br>
                    <input type="radio" name="type" value="social" {{ ($contact->type=="social")? "checked" : "" }} >
                    Social</label>
                    <br>
                    <input type="radio" name="type" value="email" {{ ($contact->type=="email")? "checked" : "" }} >
                    Email</label>
                    <br>
                    <input type="radio" name="type" value="address" {{ ($contact->type=="address")? "checked" : "" }} >
                    Address</label>
                    <br>
                    <input type="radio" name="type" value="phone" {{ ($contact->type=="phone")? "checked" : "" }} >
                    Phone</label>
                    <br>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Contact String:</strong>

                    <input type="text" class="form-control" name="contact_string"
                           value="{{ $contact->contact_string }}"></input>

                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>


    </form>

@endsection
