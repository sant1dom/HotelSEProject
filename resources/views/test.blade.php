@include('layouts.partials.head')
@include('layouts.partials.header')
@include('layouts.partials.footer-scripts')


<nav class="navbar navbar-dark bg-transparent fixed-top navbar-light d-flex justify-content-end">
    <a class="navbar-brand mr-auto" href="/" style="color: black">
        @if (!is_null($hotel))
            {{$hotel->hotelname}}
        @else
            Hotel Name
        @endif
    </a>
    <ul class="navbar-brand my-auto">
        @guest

            @if (Route::has('login'))
                <button type="button" class="btn btn-outline-dark mx-2 my-1"
                        onclick="location.href='{{ route('login') }}'">Login
                </button>
            @endif
            @if (Route::has('register'))
                <button type="button" class="btn btn-outline-dark mx-2 my-1"
                        onclick="location.href='{{ route('register') }}'">Register
                </button>
            @endif

        @else
            <li class="navbar-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle has-text-black has-text-weight-bold" href="#"
                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
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
    </ul>
    <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarsExample01"
            aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse bg-dark" id="navbarsExample01">
        <ul class="navbar-nav my-auto mx-2 text-right">
            <li class="nav-item active inline">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active inline">
                <a class="nav-link" href="{{route('rooms.userIndex')}}">Look all our rooms</a>
            </li>
            <li class="nav-item active inline">
                <a class="nav-link" href="{{route('bookings.create')}}">Booking</a>
            </li>
            <li class="nav-item active inline">
                <a class="nav-link" href="{{route('contacts.userIndex')}}">Contacts</a>
            </li>
        </ul>
    </div>
</nav>
