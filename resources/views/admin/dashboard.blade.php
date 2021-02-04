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
                        <div class="card-body">
                            <h1 class=" text-center big">{{ __('Admin Dashboard') }}</h1>
                            <div class="row my-3">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-sm d-flex justify-content-center my-4">
                                            <button type="button"
                                                    class="btn btn-outline-secondary btn-lg btn-block text-center rounded-pill"
                                                    onclick="location.href='{{ route('bookings.index') }}'">
                                                Bookings
                                            </button>
                                        </div>
                                        <div class="col-sm d-flex justify-content-center my-4">
                                            <a class="btn btn-outline-secondary btn-lg btn-block text-center rounded-pill"
                                               href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                Reports
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('admin.users.index') }}">Users
                                                    report</a>
                                                <a class="dropdown-item" href="{{ route('admin.services.index') }}">Services
                                                    report</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm has-text-centered">
                                    <img class="my-3" src="/images/CrC.png" width="100" height="100" alt="">
                                    <p>Chech-in, Relax, Check-out&trade;</p>
                                </div>
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-sm d-flex justify-content-center  my-4">
                                            <button type="button"
                                                    class="btn btn-outline-secondary btn-lg btn-block text-center rounded-pill"
                                                    onclick="location.href='{{ route('rooms.index') }}'">
                                                Rooms
                                            </button>
                                        </div>
                                        <div class="col-sm d-flex justify-content-center  my-4">
                                            <button type="button"
                                                    class="btn btn-outline-secondary btn-lg btn-block text-center rounded-pill"
                                                    onclick="location.href='{{ route('services.index') }}'">
                                                Services
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-sm d-flex justify-content-center">
                                    <button type="button"
                                            class="btn btn-outline-secondary btn-lg btn-block text-center rounded-pill"
                                            onclick="location.href='{{ route('contacts.index') }}'">
                                        Contacts
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .card.hoverCard {
            width: 50%;
            height: 100%;
            border-color: black;
            border-radius: 20px;
            left: 22%;
            bottom: 60%;
            position: absolute;
        }

        .card.dashboard {
            z-index: 1;
            height: 50%;
            width: 50%;
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
            max-width: 65%;
            margin-top: 15%;
        }
    </style>
@endsection



