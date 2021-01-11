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
                            <div id="collapse1">
                                <div class="row my-3">
                                    <div class="col-sm d-flex">
                                        <button type="button"
                                                class="btn btn-outline-secondary btn-lg btn-block rounded-pill"
                                                onclick="location.href='{{ route('admin.users.index') }}'">
                                            Users Reports
                                        </button>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-sm d-flex">
                                        <button type="button"
                                                class="btn btn-outline-secondary btn-lg btn-block rounded-pill"
                                                onclick="location.href='{{ route('admin.services.index') }}'">
                                            Services Reports
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    </style>
@endsection

