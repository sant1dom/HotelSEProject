@extends('layouts.admin-layout')
@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <h4 class="title has-text-centered text-light font-weight-bold" style="font-size:3vw;">
                User reports
            </h4>
        </div>
    </section>
    <section class="hero is-bold">
        <div class="hero-body" style="min-height: 800px">
            <div class="container dashboard">
                <div class="card hoverCard bg-warning">
                    <div class="card-body">
                        {{-- Yellow background--}}
                    </div>
                </div>
                <div class="card dashboard">
                    <div>
                        <div class="card-footer">
                            <a class="btn btn-success btn-block" href="{{route('report.users.pdf', $user)}}">Generate report</a>
                        </div>
                        <h5 class="card-header d-flex justify-content-center">
                            User Data
                        </h5>
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <table class="table table-fixed table-striped header-fixed" id="users">
                            <thead style="position: sticky; top: 0" class="thead-dark">
                            <tr>
                                <th class="header has-text-centered" scope="col">Name</th>
                                <th class="header has-text-centered" scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class=" has-text-centered">{{$user->name}}</td>
                                <td class=" has-text-centered">{{$user->email}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <h5 class="card-header d-flex justify-content-center">
                        Guests
                    </h5>
                    <div class="card-body">
                        <input type="text" id="search" class="form-control my-3" onkeyup="searchTable('guestsTable')"
                               placeholder="Search for names..">
                        <div class="table-wrapper-scroll-y table-scrollbar">
                            <table class="table table-fixed table-striped header-fixed table-bordered" id="guestsTable"
                                   style="overflow: scroll;">
                                <thead style="position: sticky; top: 0" class="thead-dark">
                                <tr>
                                    <th class="header has-text-centered" scope="col">Name</th>
                                    <th class="header has-text-centered" scope="col">Surname</th>
                                    <th class="header has-text-centered" scope="col">Birthday</th>
                                </tr>
                                </thead>
                                <tbody id="table-guests-body">
                                @foreach($guests as $guest)
                                    <tr>
                                        <td class=" has-text-centered">{{$guest->name}}</td>
                                        <td class=" has-text-centered">{{$guest->surname}}</td>
                                        <td class=" has-text-centered">{{$guest->birthdate}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <h5 class="card-header d-flex justify-content-center">
                            Bookings
                        </h5>
                        <div class="card-body">

                            {{--TODO: da inserire la lista delle prenotazioni--}}

                            <input type="text" id="searchBookings" class="form-control my-3" onkeyup="searchTableBooking('bookingsTable')"
                                   placeholder="Search for booking code..">
                            <div class="table-wrapper-scroll-y table-scrollbar">
                                <table class="table table-fixed table-striped header-fixed table-bordered" id="bookingsTable"
                                       style="overflow: scroll;">
                                    <thead style="position: sticky; top: 0" class="thead-dark">
                                    <tr>
                                        <th class="header has-text-centered" scope="col">From</th>
                                        <th class="header has-text-centered" scope="col">To</th>
                                        <th class="header has-text-centered" scope="col">Booking Code</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table-guests-body">
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td class=" has-text-centered">{{$booking->from}}</td>
                                            <td class=" has-text-centered">{{$booking->to}}</td>
                                            <td class=" has-text-centered">{{$booking->booking_code}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <link href="{{ asset('css/adminIndex.css') }}" rel="stylesheet">
    <script src="{{asset('js/searchTable.js')}}"></script>

    <script>
        function searchTableBooking(idTable) {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchBookings");
            filter = input.value.toUpperCase();
            table = document.getElementById(idTable);
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection

