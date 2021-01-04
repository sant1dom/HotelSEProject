@extends('layouts.mainlayout')
@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><b>Contacts</b></li>
                        @foreach($contacts as $contact)
                            @if($contact->type == 'phone' || $contact->type == 'email')
                                <li>{{ $contact->contact_string }}</li>
                            @endif
                        @endforeach
                    </ul>
                    <ul class="list-unstyled">
                        <li><b>Address</b></li>
                        @foreach($contacts as $contact)
                            @if($contact->type == 'address')
                                <li>{{ $contact->contact_string }}</li>
                            @endif
                        @endforeach
                    </ul>
                    <ul class="list-unstyled">
                        <li><b>Social</b></li>
                        @foreach($contacts as $contact)
                            @if($contact->type == 'social')
                                <li>{{ $contact->contact_string }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .container-fluid {
        background-image: url("https://www.atlantis.com/-/media/atlantis/dubai/atp/resort/exterior/AtlantisThePalm-Exterior-FrontShotWithRoyalPool.jpg?sc_lang=it");
        background-size: cover;
        background-attachment: fixed;
    }
</style>
