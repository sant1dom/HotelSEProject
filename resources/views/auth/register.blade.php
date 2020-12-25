@extends('layouts.mainlayout')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
                <div class="card card-signup my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ __('Register') }}</h5>
                        <form class="form-signup" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-label-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <label for="name">{{ __('Name') }}</label>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-label-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-label-group">
                                <input type="password" name="password" id="password" minlength="8" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                                <label for="password">{{ __('Password') }}</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="password_confirmation" id="password-confirm" minlength="8" class="form-control @error('password') is-invalid @enderror" placeholder="Confirm Password" required>
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                @error('password-confirm')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
@endsection

<style>
    .container-fluid{
        background-image: url("https://www.atlantis.com/-/media/5D889FDC5F3B43EBB41B6046D67D35AD.jpg?sc_lang=en");
        background-size: cover;
        background-attachment: fixed;
    }
    .card-signup {
        border: 0;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .card-signup .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem;
    }

    .card-signup .card-body {
        padding: 2rem;
    }

    .form-signup {
        width: 100%;
    }

    .form-signup .btn {
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s;
    }

</style>
