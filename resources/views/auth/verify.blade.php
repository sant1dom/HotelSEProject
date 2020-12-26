@extends('layouts.mainlayout')

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <div class="text-black has-text-weight-bold">{{ __('Verify Your Email Address') }}</div>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>

                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .container-fluid{
        background-image: url("https://cdnb.artstation.com/p/assets/images/images/005/388/621/large/fidel-hau-atlantis-achivis.jpg?1490679855");
        background-size: cover;
        background-attachment: fixed;
    }
    .card-signin {
        border: 0;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem;
    }

    .card-signin .card-body {
        padding: 2rem;
    }

    .form-signin {
        width: 100%;
    }

    .form-signin .btn {
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s;
    }

</style>
