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
        <div class="hero-body" >
            <div class="container d-flex justify-content-center">
                <div class="col-sm">
                    <a href="{{ route('totem.checkout') }}"><img class="rounded-pill" src="/images/Check-out-black.png"
                                                                 alt=""></a>
                </div>
                <div class="col-sm">
                    <a href="{{ route('totem.checkin') }}"><img class="rounded-pill" src="/images/check-in.png" alt=""></a>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <a class="btn btn-light rounded-pill" href="{{ route('totem.changeCard') }}">
                    Problems with your card?
                </a>
            </div>
        </div>
    </section>
@endsection
