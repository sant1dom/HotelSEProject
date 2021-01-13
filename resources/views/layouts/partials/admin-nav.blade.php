<nav class="navbar navbar-dark bg-light fixed-top d-flex justify-content-end">
    <a class="navbar-brand mr-auto" href="{{route('admin.dashboard')}}" style="color: black;">
        @if (!is_null($hotel))
            {{$hotel->hotelname}}
        @else
            Hotel Name
        @endif
    </a>
    <ul class="navbar-brand my-auto">
        <li class="navbar-item dropdown">
            <a class="btn btn-outline-dark" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
    <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarsExample01"
            aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation" id="toggleButton">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse bg-light" id="navbarsExample01">
        <ul class="navbar-nav my-auto mx-2 text-right float-right">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.dashboard')}}" style="color: black"><h5>Home <span
                            class="sr-only">(current)</span></h5></a>
            </li>
            <li class="nav-item dropleft">
                <a class="nav-link dropdown-menu-left-toggle" style="color: black;"
                   href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <h5>Reports</h5>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="position: absolute">
                    <a class="dropdown-item" href="{{ route('admin.users.index') }}">Users
                        report</a>
                    <a class="dropdown-item" href="{{ route('admin.services.index') }}">Services
                        report</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dashboard')}}" style="color: black"><h5>Bookings</h5></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('rooms.index')}}" style="color: black"><h5>Rooms</h5></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('services.index')}}" style="color: black"><h5>Services</h5></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('contacts.index')}}" style="color: black"><h5>Contacts</h5></a>
            </li>
        </ul>

    </div>
</nav>

<style>

</style>
