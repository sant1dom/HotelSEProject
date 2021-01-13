@extends('layouts.mainlayout')

@section('content')
    <?php
    $rooms = App\Models\Room::get()->unique('type');
    $guests = App\Models\Guest::all();
    ?>

    <select class="selectpicker" multiple data-live-search="true">
        <option>Mustard</option>
        <option>Ketchup</option>
        <option>Relish</option>
    </select>
@endsection
