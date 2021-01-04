@extends('layouts.admin-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
                <div class="card my-5">
                    <div class="card-body">
                        <h1 class=" text-center big">{{ __('Admin Dashboard') }}</h1>
                            <div class="mx-3">
                                <h2>Manage Rooms</h2>
                                <button class="btn btn-outline-primary"><a href="{{route('rooms.index')}}">Rooms</a></button>
                                <h2>Manage Services</h2>
                                <button class="btn btn-outline-primary"><a href="{{route('services.index')}}">Services</a></button>
                                <h2>Manage Contacts</h2>
                                <button class="btn btn-outline-primary"><a href="{{route('contacts.index')}}">Contacts</a></button>
                                <h2>Reports</h2>
                                <button class="btn btn-outline-primary"><a href="">Reports</a></button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



