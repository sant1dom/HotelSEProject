<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <a class="navbar-brand my-auto" href="/">Hotel Name</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/booking">Book a room</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contacts">Contacts</a>
            </li>
        </ul>
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <button type="button" class="btn btn-warning mr-2">
                    <a href="{{ route('login') }}" style="color: inherit">{{ __('Login') }}</a>
                </button>
            @endif

            @if (Route::has('register'))
                <button type="button" class="btn btn-outline-primary">
                    <a href="{{ route('register') }}" style="color: inherit">{{ __('Register') }}</a>
                </button>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item btn btn-outline-primary" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest

    </div>
</nav>
