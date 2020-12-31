@extends('layouts.mainlayout')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h2> Guest details </h2>
                        <ul class="list-unstyled">
                            <li><b>Name</b></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><b>Surname</b></li>

                        </ul>
                        <ul class="list-unstyled">
                            <li><b>Birthdate</b></li>

                        </ul>
                        <ul class="list-unstyled">
                            <li><b>Document type</b></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><b>Document Number</b></li>
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
