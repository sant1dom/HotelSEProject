@extends('layouts.admin-layout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <h4 class="title has-text-centered text-light font-weight-bold" style="font-size:3vw;">
                Services list
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
                        <input type="text" id="search" class="form-control my-3" onkeyup="searchTable('servicesTable')"
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
                    <div>
                        <div class="card-body">
                            <div class="table-wrapper-scroll-y table-scrollbar">
                                <table class="table table-fixed table-striped header-fixed table-bordered" id="servicesTable">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th class="header has-text-centered" scope="col">Name</th>
                                        <th class="header has-text-centered" scope="col">Price</th>
                                        <th class="header has-text-centered" scope="col">Current In</th>
                                        <th class="header has-text-centered" scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody style=" overflow: scroll;">
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{$service->name}}</td>
                                            <td class="has-text-centered">{{$service->price}}</td>
                                            <td class="has-text-centered">{{$service->reports->whereNotNull('enteredAt')->whereNull('exitAt')->count()}}</td>

                                            <td>
                                                <div class="row" style="margin: auto">
                                                    <div class="col-sm">
                                                        <a class="btn btn-primary btn-block"
                                                           href="{{route('report.services.pdf', $service)}}">Generate
                                                            Report</a>
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




