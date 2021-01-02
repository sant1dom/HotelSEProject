@extends('layouts.mainlayout')
@section('content')
    <div class="">
     <div class="row mx-auto my-auto">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Guest details </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('guests.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row mx-auto my-auto">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $guest->name }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Surname:</strong>
                {{ $guest->surname }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Birthdate:</strong>
                {{ $guest->birthdate}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Document:</strong>
                {{ $guest->doctype }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Document number:</strong>
                {{ $guest->numdoc}}
            </div>
        </div>
    </div>
@endsection



