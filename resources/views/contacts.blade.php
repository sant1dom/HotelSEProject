@extends('layouts.mainlayout')
@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><b>Contacts</b></li>
                        <li>Telefono : 0862 000000</li>
                        <li>Fax : 0862 000000</li>
                        <li>Email : info@hotel.com</li>
                    </ul>
                    <ul class="list-unstyled">
                        <li><b>Address</b></li>
                        <li>Strada Statale 17</li>
                        <li>L'Aquila (AQ), 67100</li>
                    </ul>
                    <ul class="list-unstyled">
                        <li><b>Social</b></li>
                        <li>Facebook : https://www.facebook.com/</li>
                        <li>Instagram : https://www.instagram.com/</li>
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
