@extends('layouts.mainlayout')
@section('content')
    <form method="POST" action="{{ route('guests.update', $guest) }}" enctype="multipart/form-data"
          autocomplete="off">
        @csrf
        @method('PUT')
        <section class="hero is-fullheight is-bold">
            <div class="hero-body is-align-items-stretch">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="container-fluid dashboard">
                    <div class="col-sm-12 my-5 d-flex justify-content-center">

                        <div class="card dashboard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm h-75">
                                        <h3 class="text-center">Guest Details</h3>
                                        <div class="form-group has-text-centered">
                                            <div class="autocomplete" style="width: 100%">
                                                <label class="control-label" for="name">
                                                    Name
                                                </label>
                                                <input class="form-control @error('type') is-invalid @enderror"
                                                       id="name" type="text" name="name" placeholder="Ex.: Bar"
                                                       value="{{ $guest->name }}"/>
                                            </div>

                                            <label class="control-label " for="surname">
                                                Surname
                                            </label>
                                            <input class="form-control @error('type') is-invalid @enderror"
                                                   id="surname"
                                                   name="surname" type="text" placeholder="Ex.: Bar"
                                                   value="{{ $guest->surname}}"/>


                                            <label class="control-label " for="surname">
                                                Birthdate
                                            </label>
                                            <input id="birthdate" type="date"
                                                   class="form-control @error('date') is-invalid @enderror" name="birthdate"
                                                   value="{{$guest->birthdate}}"/>

                                            <label class="control-label " for="doctype">
                                                Document type
                                            </label>
                                            <input class="form-control @error('type') is-invalid @enderror"
                                                   id="doctype"
                                                   name="doctype" type="text" placeholder="Ex.: Bar"
                                                   value="{{ $guest->doctype}}"/>

                                            <label class="control-label " for="numdoc">
                                                Document number
                                            </label>
                                            <input class="form-control @error('type') is-invalid @enderror"
                                                   id="numdoc"
                                                   name="numdoc" type="text" placeholder="Ex.: Bar"
                                                   value="{{ $guest->numdoc}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success btn-block" type="submit">Save</button>
                            </div>
        </section>
    </form>

    <style>
        .hero-body {
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 40%), url("https://www.atlantis.com/-/media/atlantis/dubai/atp/resort/exterior/AtlantisThePalm-Exterior-FrontShotWithRoyalPool.jpg?sc_lang=it");
            background-position: center bottom;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
        }
        
        .alert {
            position: absolute;
            left: 80%;
            top: 5%;
            z-index: 999;
        }

        .card.hoverCard {
            width: 40%;
            height: 100%;
            border-color: black;
            border-radius: 20px;
            right: 32%;
            bottom: 10%;
            position: absolute;
        }

        .card.dashboard {
            z-index: 1;
            height: 50%;
            width: 40%;
            border-color: black;
            border-radius: 20px;
            background-color: white !important;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);
            position: relative;

        }

        .container-fluid.dashboard {
            max-width: 100%;
            max-height: 50%;
        }

        .imagePreviewEdit {
            width: 100%;
            height: 224px;
            background-position: center;
            background-color: #fff;
            background-size: cover;
            background-repeat: no-repeat;
            display: inline-block;
            box-shadow: 0 -3px 6px 2px rgba(0, 0, 0, 0.2);
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="{{ asset('css/imgUploaderStyle.css') }}" rel="stylesheet">
    <script src="{{asset('js/dynamicImageUpload.js')}}"></script>
@endsection

