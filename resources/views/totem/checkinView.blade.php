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
        <form id="Check-in-form" action="{{ route('totem.checkin') }}" method="GET" autocomplete="off">
            <div class="hero-body">
                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session()->get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="container">
                    <div class="col-sm d-flex justify-content-center" style="height: 100%">
                        <input class="form-control rounded-pill has-text-centered has-text" type="text"
                               style="height: 100%; font-size: 6rem;" placeholder="Enter email" name="email" required>

                        <a class='fas fa-info-circle popover-dismiss' style='font-size:48px; left: 92%; top: 33%' tabindex="0" data-toggle="popover"
                           data-content="Enter the email of the person who booked"></a>
                    </div>
                    <br>
                    <br>
                    <div class="col-sm d-flex justify-content-center" style="height: 100%">
                        <input class="form-control rounded-pill has-text-centered has-text" type="text"
                               style="height: 100%; font-size:  6rem;" placeholder="Enter the booking ID"
                               name="booking_code" required>
                        <a class='fas fa-info-circle popover-dismiss' style='font-size:48px; left: 92%; top: 33%' tabindex="0" data-toggle="popover"
                           data-content="The id was provided to the user after completing the booking"></a>
                    </div>
                    <br>
                    <br>
                    <div class="col-sm d-flex justify-content-center" style="height: 100%">
                        <button class="btn rounded-pill btn-primary" style="width: 30%" type="submit">
                            <h2>Check-in now!</h2>
                        </button>
                    </div>
                </div>
            </div>
        </form>
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
            left: 20%;
            right: 20%;
            transform: translate(50% 50%);
            z-index: 999;
        }


        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .popover-dismiss {
            position: absolute;
        }

        a:hover {
            text-decoration: none;
        }

        a:focus{
            outline: none;
        }

    </style>
@endsection
