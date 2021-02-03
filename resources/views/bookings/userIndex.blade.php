@extends('layouts.mainlayout')
@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <h4 class="title has-text-centered text-light font-weight-bold" style="font-size:3vw;">
                My Bookings
            </h4>
        </div>
    </section>
    <section class="hero is-bold">
        <div class="hero-body">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="container dashboard">
                <div class="card dashboard">
                    <div class="card-header d-flex justify-content-center">
                        <input type="text" id="search" class="form-control my-1" onkeyup="searchTable('guestsTable')"
                               placeholder="Search for names.." autocomplete="off">
                    </div>
                    <div class="card-body">
                        <div class="table-wrapper-scroll-y table-scrollbar">
                            <table class="table table-fixed table-striped header-fixed table-bordered"
                                   id="guestsTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="header has-text-centered" scope="col">Room</th>
                                    <th class="header has-text-centered" scope="col">Check-in date</th>
                                    <th class="header has-text-centered" scope="col">Check-out date</th>
                                    <th class="header has-text-centered" scope="col">Booking code</th>
                                    <th class="header has-text-centered" scope="col">Actions</th>
                                </tr>
                                </thead>
                                @if(isset($bookings))
                                    @foreach($bookings as $booking)
                                        <tbody>
                                            <tr>
                                                <td class="has-text-centered">
                                                    {{$booking->rooms[0]->type}}, N°{{$booking->rooms[0]->numroom}}</td>
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
                                                    @if(!$booking->check_out)
                                                        <div class="col-sm">
                                                            <a class="btn btn-primary btn-block"
                                                               href="{{route('bookings.addservice', $booking)}}">Add Services</a>
                                                        </div>
                                                    @endif
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


    <script>
        function searchTable(idTable) {
            // Declare variables
            let input, filter, table, tr, td, i, txtValue, td2, txtValue2;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById(idTable);
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td2 = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <style>
        .alert {
            position: absolute;
            top: 0;
            left: 20%;
            right: 20%;
            transform: translate(50% 50%);
            z-index: 999;
        }

        .dot {
            height: 15px;
            width: 15px;
            border-radius: 50%;
            display: inline-block;
        }

        .hero-body {
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 40%), url("https://www.atlantis.com/-/media/atlantis/dubai/atp/resort/exterior/AtlantisThePalm-Exterior-FrontShotWithRoyalPool.jpg?sc_lang=it");
            background-position: center bottom;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
        }

        .table-scrollbar {
            position: relative;
            height: 26rem; /*sostituire con height: 21.6rem; se non si vuole il ridimensionamento dinamico*/
            overflow: scroll;
            display: block;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .table-scrollbar::-webkit-scrollbar {
            display: none;
        }

        thead {
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .container.dashboard {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card.dashboard {
            z-index: 1;
            width: 100%;
            border-color: black;
            border-radius: 20px;
            background-color: white !important;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);
        }
    </style>

@endsection
