@extends('layouts.admin-layout')

@section('content')
    <?php
    $rooms = App\Models\Room::get()->unique('type');
    $guests = App\Models\Guest::all();
    $contacts = App\Models\Contact::orderBy('type')->Paginate(7);
    ?>

@endsection
