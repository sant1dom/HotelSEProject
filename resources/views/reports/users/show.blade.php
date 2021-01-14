@extends('layouts.admin-layout')
@section('content')
    <section class="hero is-fullheight is-bold" style="overflow:hidden;">
        <div class="hero-body">
            <div class="container-fluid dashboard">
                <div class="col-sm-12">
                    <div class="card hoverCard bg-warning">
                        <div class="card-body">
                            {{--Yellow background--}}
                        </div>
                    </div>
                    <div class="card dashboard">
                        <div>
                            <h5 class="card-header d-flex justify-content-center">
                                User Data
                            </h5>
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
                        <div>
                            <h5 class="card-header d-flex justify-content-center">
                                Guests
                            </h5>
                            <input type="text" id="search" class="form-control my-3" onkeyup="myFunction()" placeholder="Search for names..">
                            <table class="table table-fixed table-striped header-fixed" id="guests">
                                <thead style="position: sticky; top: 0" class="thead-dark">
                                <tr>
                                    <th class="header has-text-centered" scope="col">Name</th>
                                    <th class="header has-text-centered" scope="col">Surname</th>
                                    <th class="header has-text-centered" scope="col">Birthday</th>
                                </tr>
                                </thead>
                                <tbody>
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
                        <div>
                            <h5 class="card-header d-flex justify-content-center">
                                Bookings
                            </h5>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-success btn-block" href="">Generate report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    .hero {
        position: absolute;
    }

    .card.hoverCard {
        width: 68%;
        height: 100%;
        border-color: black;
        border-radius: 20px;
        left: 13%;
        bottom: 56%;
        position: absolute;
    }

    .card.dashboard {
        z-index: 1;
        height: 50%;
        width: 70%;
        border-color: black;
        border-radius: 20px;
        background-color: white !important;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);
        position: relative;
        left: 50%;
        top: 100%;
        transform: translate(-50%, -50%);
    }

    .container-fluid.dashboard {
        max-width: 80%;
        max-height: 50%;
        margin-top: 17%;
    }

    .dot {
        height: 15px;
        width: 15px;
        border-radius: 50%;
        display: inline-block;
    }

    .header {
        position: sticky;
        top: 0;
    }

</style>

<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("guests");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
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
