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
                            {{ $contacts->links( "pagination::bootstrap-4" ) }}
                        </h5>
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div id="collapse1">
                            <div class="card-body">
                                <table class="table table-fixed table-striped header-fixed">
                                    <thead style="position: sticky; top: 0" class="thead-dark">
                                    <tr>
                                        <th class="header has-text-centered" scope="col">Type</th>
                                        <th class="header has-text-centered" scope="col">Description</th>
                                        <th class="header has-text-centered" scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td class="text-capitalize">{{$contact->type}}</td>
                                            <td class="has-text-centered">{{$contact->contact_string}}</td>
                                            <td>
                                                <form action="{{ route('contacts.destroy',$contact->id) }}"
                                                      method="POST">
                                                    <div class="row" style="margin: auto">
                                                        <div class="col-sm ">
                                                            <a class="btn btn-primary btn-block"
                                                               href="{{route('contacts.edit', $contact)}}">Edit/Show</a>
                                                        </div>
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="col-sm">
                                                            <button type="submit" class="btn btn-danger btn-block">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-success btn-block" href="{{ route('contacts.create') }}">Create a new
                                    contact</a>
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
            height: auto;
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

        .header {
            position: sticky;
            top: 0;
        }

        .alert {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 999;
        }

    </style>
@endsection

