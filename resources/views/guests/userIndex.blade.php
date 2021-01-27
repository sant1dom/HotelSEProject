@extends('layouts.mainlayout')
@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <h4 class="title has-text-centered text-light font-weight-bold" style="font-size:3vw;">
                My Guests
            </h4>
        </div>
    </section>
        <section class="hero is-bold">
            <div class="hero-body">
                <div class="container dashboard">
                    <div class="card dashboard">
                        <div class="card-header d-flex justify-content-center">
                            <input type="text" id="search" class="form-control my-1" onkeyup="searchTable('guestsTable')"
                                   placeholder="Search for names.." autocomplete="off">
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
                                       id="guestsTable">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th class="header has-text-centered" scope="col">Name</th>
                                        <th class="header has-text-centered" scope="col">Surname</th>
                                        <th class="header has-text-centered" scope="col">Birthdate</th>
                                        <th class="header has-text-centered" scope="col">Document Type</th>
                                        <th class="header has-text-centered" scope="col">Document Number</th>
                                        <th class="header has-text-centered" scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($guests as $guest)
                                        <tr>
                                            <td class="has-text-centered">{{$guest->name}}</td>
                                            <td class="has-text-centered">{{$guest->surname}}</td>
                                            <td class="has-text-centered">{{$guest->birthdate}}</td>
                                            <td class="has-text-centered">{{$guest->doctype}}</td>
                                            <td class="has-text-centered">{{$guest->numdoc}}</td>
                                            <td>
                                                <div class="row" style="margin: auto">
                                                    <div class="col-sm ">
                                                        <a class="btn btn-primary btn-block"
                                                           href="{{route('guests.edit', $guest)}}">Edit/Show</a>
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


    <script src="{{asset('js/searchTable.js')}}"></script>
    <style>
        .hero-body {
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 40%), url("https://www.atlantis.com/-/media/atlantis/dubai/atp/resort/exterior/AtlantisThePalm-Exterior-FrontShotWithRoyalPool.jpg?sc_lang=it");
            background-position: center bottom;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
        }

        .header {
            position: sticky;
            top: 0;
        }

        .table-scrollbar {
            position: relative;
            height: 26rem;  /*sostituire con height: 21.6rem; se non si vuole il ridimensionamento dinamico*/
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


