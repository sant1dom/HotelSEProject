@extends('layouts.admin-layout')
@section('content')
    <div class="mx-3">
        <h1>Manage Rooms</h1>
        <h1>Manage Services</h1>
        <button class="btn btn-outline-primary"><a href="{{route('services.index')}}">Services</a></button>
        <h1>Manage Contacts</h1>
        <button class="btn btn-outline-primary"><a href="{{route('contacts.index')}}">Contacts</a></button>
        <h1>Reports</h1>

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
    </div>
@endsection
