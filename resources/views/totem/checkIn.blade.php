@extends('layouts.totemLayout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
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
    </section>
    <section class="hero is-bold">
        <div class="hero-body" style="height: 45rem">
            <form  >
            <div class="container">
                <div class="col-sm d-flex justify-content-center" style="height: 100%">
                    <input class="form-control rounded-pill has-text-centered has-text" type="number"
                           style="height: 100%; font-size: 6rem;" placeholder="Insert email...">
                </div>
                <br>
                <br>
                <div class="col-sm d-flex justify-content-center" style="height: 100%">
                    <input class="form-control rounded-pill has-text-centered has-text" type="number"
                           style="height: 100%; font-size:  6rem;" placeholder="Insert your booking ID..."
                           id="code">
                </div>
                <br>
                <br>
            </div>
            <div class="row d-flex justify-content-center">
                <a class="btn btn-light rounded-pill" href="{{ route('totem.changeCard') }}">
                    Problems with your card?
                </a>
            </div>
            </form>
        </div>
    </section>

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection
