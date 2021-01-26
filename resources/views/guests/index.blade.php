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
            <div class="hero-body" style="height: 800px">
                <div class="container dashboard">
                    <div class="card dashboard">
                        <div class="card-header d-flex justify-content-center">
                            <input type="text" id="search" class="form-control my-3" onkeyup="searchTable('guestsTable')"
                                   placeholder="Search for names..">
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

    </div>

    <script src="{{asset('js/searchTable.js')}}"></script>
    <style>
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
            z-index: 999
    </style>

@endsection


