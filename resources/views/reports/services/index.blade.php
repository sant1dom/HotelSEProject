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
                        <h5 class="card-header d-flex justify-content-center">
                            {{ $services->links( "pagination::bootstrap-4" ) }}
                        </h5>
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div>
                            <input type="text" id="search" class="form-control my-3" onkeyup="myFunction()" placeholder="Search for names..">
                            <table class="table table-fixed table-striped header-fixed" id="services">
                                <thead style="position: sticky; top: 0" class="thead-dark">
                                <tr>
                                    <th class="header has-text-centered" scope="col">Name</th>
                                    <th class="header has-text-centered" scope="col">Price</th>
                                    <th class="header has-text-centered" scope="col">Current In</th>
                                    <th class="header has-text-centered" scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{$service->name}}</td>
                                        <td class="has-text-centered">{{$service->price}}</td>
                                        <td class="has-text-centered">{{$service->reports->whereNotNull('enteredAt')->whereNull('exitAt')->count()}}</td>

                                        <td>
                                            <div class="row" style="margin: auto">
                                                <div class="col-sm ">
                                                    <a class="btn btn-primary btn-block"
                                                       href="{{route('report.services.report', $service)}}">Show report</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("services");
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

<style>
    .hero {
        position: absolute;
    }

    #collapse1 {
        height: 34rem;
        width: 100%;
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

