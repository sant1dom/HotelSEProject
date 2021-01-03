@extends('layouts.admin-layout')
@section('content')
    <div class="row mx-auto my-auto">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Contact</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>
            </div>
        </div>
    </div>



    <div class="row mx-auto my-auto">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type:</strong>
                {{ $contact->type }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contact String:</strong>
                {{ $contact->contact_string }}
            </div>
        </div>

    </div>

@endsection
