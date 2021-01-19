@extends('layouts.admin-layout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <h4 class="title has-text-centered text-light font-weight-bold" style="font-size:3vw;">
                Users list
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
                        <input type="text" id="search" class="form-control my-3" onkeyup="searchTable('usersTable')"
                               placeholder="Search for type..">
                    </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div>
                        <div class="card-body">
                            <div class="table-wrapper-scroll-y table-scrollbar">
                                <table class="table table-fixed table-striped header-fixed table-bordered"
                                       id="usersTable">
                                    <thead style="position: sticky; top: 0" class="thead-dark">
                                    <tr>
                                        <th class="header has-text-centered" scope="col">Name</th>
                                        <th class="header has-text-centered" scope="col">Email</th>
                                        <th class="header has-text-centered" scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>

                                            <td>
                                                <div class="row" style="margin: auto">
                                                    <div class="col-sm ">
                                                        <a class="btn btn-primary btn-block"
                                                           href="{{route('report.users.show', $user)}}">Show report</a>
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
        </div>
    </section>

    <link href="{{ asset('css/adminIndex.css') }}" rel="stylesheet">
    <script src="{{asset('js/searchTable.js')}}"></script>
@endsection




