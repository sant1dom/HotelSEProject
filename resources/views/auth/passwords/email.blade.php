@extends('layouts.mainlayout')

@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ __('Reset Password') }}</h5>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    <form class="form-signin" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .container-fluid{
        background-image: url("https://images.musement.com/cover/0002/09/atlantis-the-palm-jpg_header-108327.jpeg");
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
