@extends('layouts.admin-layout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <h4 class="title has-text-centered text-light font-weight-bold" style="font-size:3vw;">
                Bookings management
            </h4>
        </div>
    </section>
    <section class="hero is-bold">
        <div class="hero-body" style="height: 800px">
            <div class="container dashboard">
                <div class="card hoverCard bg-warning">
                    <div class="card-body">
                        {{-- Yellow background--}}
                    </div>
                </div>
                <div class="card dashboard">
                    <div class="card-header d-flex justify-content-center">
                        <input type="text" id="search" class="form-control my-3" onkeyup="searchTable('bookingsTable')"
                               placeholder="Search for room number..">
                    </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-wrapper-scroll-y table-scrollbar">
                            <table class="table table-fixed table-striped header-fixed table-bordered"
                                   id="bookingsTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="header has-text-centered" scope="col">Room</th>
                                    <th class="header has-text-centered" scope="col">Check-in date</th>
                                    <th class="header has-text-centered" scope="col">Check-out date</th>
                                    <th class="header has-text-centered" scope="col">Booking code</th>
                                    <th class="header has-text-centered" scope="col">User Data</th>
                                </tr>
                                </thead>
                                @if(isset($bookings))
                                    @foreach($bookings as $booking)
                                        <tbody>
                                        <tr>
                                            <td class="has-text-centered">
                                                {{$booking->rooms[0]->type}},
                                                N°{{$booking->rooms[0]->numroom}}</td>
                                            <td class="has-text-centered">
                                                @if($booking->check_in)
                                                    <span class="dot" style="background-color: green"></span>
                                                @else
                                                    <span class="dot" style="background-color: red"></span>
                                                @endif
                                                {{$booking->from}}
                                            </td>
                                            <td class="has-text-centered">
                                                @if($booking->check_out)
                                                    <span class="dot" style="background-color: green"></span>
                                                @else
                                                    <span class="dot" style="background-color: red"></span>
                                                @endif
                                                {{$booking->to}}
                                            </td>
                                            <td class="has-text-centered">
                                                {{$booking->booking_code}}
                                            </td>
                                            <td class="has-text-centered">
                                                <div class="col-sm">
                                                    {{$booking->user->name ." ". $booking->user->surname ." ". $booking->user->email}}
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <link href="{{ asset('css/adminIndex.css') }}" rel="stylesheet">
    <script>
        function searchTable() {
            // Declare variables
            let input, filter, table, tr, td, i, txtValue, td2, td3, txtValue2, txtValue3;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("bookingsTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td2 = tr[i].getElementsByTagName("td")[3];
                td3 = tr[i].getElementsByTagName("td")[4];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td.innerText;
                    txtValue3 = td2.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
