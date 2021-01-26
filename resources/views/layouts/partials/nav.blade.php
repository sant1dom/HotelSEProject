<nav class="navbar navbar-dark bg-light fixed-top d-flex justify-content-end">
    <a class="navbar-brand mr-auto" href="/" style="color: black;">
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
                    <a class="dropdown-item has-text-black has-text-weight-bold" href="{{route('guests.index')}}">
                        {{ __('My guests') }}
                    </a>
                    <a class="dropdown-item has-text-black has-text-weight-bold" href="{{route('bookings.userIndex')}}">
                        {{ __('My bookings') }}
                    </a>
                    <a class="dropdown-item has-text-black has-text-weight-bold" href="{{ route('logout') }}"
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
            aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation" id="toggleButton">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse bg-light" id="navbarsExample01">
        <ul class="navbar-nav my-auto mx-2 text-right">
            <li class="nav-item active inline">
                <a class="nav-link" href="/" style="color: black"><h5>Home</h5><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active inline">
                <a class="nav-link" href="{{route('rooms.userIndex')}}" style="color: black"><h5>Look all our rooms</h5></a>
            </li>
            <li class="nav-item active inline">
                <a class="nav-link" href="{{route('bookings.stepOne')}}" style="color: black"><h5>Booking</h5></a>
            </li>
            <li class="nav-item active inline" >
                <a class="nav-link" href="{{route('contacts.userIndex')}}" style="color: black"><h5>Contacts</h5></a>
            </li>
        </ul>
    </div>
</nav>

