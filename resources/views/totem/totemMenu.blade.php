@extends('layouts.totemLayout')

@section('content')
    <section class="hero is-fullheight is-bold">
        <div class="hero-head my-5">
            <h4 class="subtitle text-light font-weight-bold has-text-centered" style="font-size:2vw;">
                @if ($hotel)
                    Welcome to a {{$hotel->stars}} <span class="text-warning">&#9733</span> hotel <br/>
                @else
                    Hotel Name<br/>
                @endif
            </h4>
            <h4 class="title text-light font-weight-bold has-text-centered" style="font-size:4vw;">
                @if (!is_null($hotel))
                    {{$hotel->hotelname}}<br/>
                @else
                    Hotel Name<br/>
                @endif
            </h4>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
                <h1>{{ session()->get('success') }}</h1>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="hero-body">
            <div class="container d-flex justify-content-center">
                <div class="col-sm">
                    <a href="{{ route('totem.checkoutView') }}"><img class="rounded-pill" src="/images/Check-out.png"
                                                                     alt=""></a>
                </div>
                <div class="col-sm">
                    <a href="{{ route('totem.checkinView') }}"><img class="rounded-pill" src="/images/Check-in.png"
                                                                    alt=""></a>
                </div>
            </div>
        </div>
        <div class="hero-footer" style="margin-bottom: 3%">
            <div class="container d-flex justify-content-center">
                <a class="btn btn-light rounded-pill" href="{{ route('totem.changeCard') }}">
                    Problems with your card?
                </a>
            </div>
        </div>
    </section>

    <style>
        .alert {
            position: absolute;
            top: 25%;
            left: 0;
            right: 0;
            margin: auto;
            text-align: center;
            width: 80%;
            z-index: 999;
        }
    </style>
@endsection
