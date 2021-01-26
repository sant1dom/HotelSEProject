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
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-label-group my-1">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name') }}" required autocomplete="name"
                                               autofocus>

                                    </div>

                                    <div class="form-label-group my-1">
                                        <label for="surname">{{ __('Surname') }}</label>
                                        <input id="surname" type="text"
                                               class="form-control @error('surname') is-invalid @enderror"
                                               name="surname" value="{{ old('surname') }}" required
                                               autocomplete="surname"
                                               autofocus>

                                    </div>

                                    <div class="form-label-group my-1">
                                        <label for="doctype">{{ __('Document type') }}</label>
                                        <input id="doctype" type="text"
                                               class="form-control @error('doctype') is-invalid @enderror"
                                               name="doctype" value="{{ old('doctype') }}" required
                                               autocomplete="doctype"
                                               autofocus>

                                    </div>

                                    <div class="form-label-group my-1">
                                        <label for="numdoc">{{ __('Document number') }}</label>
                                        <input id="numdoc" type="text"
                                               class="form-control @error('numdoc') is-invalid @enderror"
                                               name="numdoc" value="{{ old('numdoc') }}" required
                                               autocomplete="numdoc"
                                               autofocus>

                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-label-group my-1">
                                        <label for="birthdate">{{ __('Birth date') }}</label>
                                        <input id="birthdate" type="date"
                                               class="form-control @error('birthdate') is-invalid @enderror"
                                               name="birthdate" value="{{ old('birthdate') }}" required autocomplete="name"
                                               autofocus>

                                    </div>

                                    <div class="form-label-group my-1">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="email"
                                               autofocus>

                                    </div>

                                    <div class="form-label-group my-1">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input type="password" name="password" id="password" minlength="8"
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Password" required>

                                    </div>

                                    <div class="form-label-group my-1">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <input type="password" name="password_confirmation" id="password-confirm"
                                               minlength="8"
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Confirm Password" required>
                                    </div>
                                    <br>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">
                                    Register
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
    .container-fluid {
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
