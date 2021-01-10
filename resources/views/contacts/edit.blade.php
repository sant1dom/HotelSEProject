@extends('layouts.admin-layout')

@section('content')
    <form method="POST" action="{{ route('contacts.update', $contact) }}">
        @csrf
        @method('PUT')
        <section class="hero is-fullheight is-bold">
            <div class="hero-body is-align-items-stretch">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="container-fluid dashboard">
                    <div class="col-sm-12 my-5 d-flex justify-content-center">
                        <div class="card hoverCard bg-warning">
                            <div class="card-body">
                                {{--Yellow background--}}
                            </div>
                        </div>
                        <div class="card dashboard">
                            <div class="card-body">
                                <div class="col-sm">
                                    <h3 class="text-center">Details</h3>
                                    <div class="form-group has-text-centered">
                                        <div class="autocomplete" style="width: 100%">
                                            <label class="control-label my-2" for="contact_string">
                                                Description
                                            </label>
                                            <input class="form-control @error('contact_string') is-invalid @enderror"
                                                   id="contact_string" type="text" name="contact_string"
                                                   placeholder="Ex.: example@email.com"
                                                   value="{{$contact->contact_string }}"/>
                                        </div>
                                        <label class="my-2" for="type">Type</label>
                                        <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                            <option value="Social" {{ ($contact->type=="Social")? "checked" : "" }}>Social</option>
                                            <option value="Email" {{ ($contact->type=="Email")? "checked" : "" }}>Email</option>
                                            <option value="Address" {{ ($contact->type=="Address")? "checked" : "" }}>Address</option>
                                            <option value="Phone" {{ ($contact->type=="Phone")? "checked" : "" }}>Phone</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success btn-block" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <style>
        .form-control {
            background-color: #f1f1f1;
        }

        .alert {
            position: absolute;
            left: 80%;
            top: 5%;
            z-index: 999;
        }

        .card.hoverCard {
            width: 68%;
            height: 100%;
            border-color: black;
            border-radius: 20px;
            right: 19%;
            bottom: 10%;
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

        }

        .container-fluid.dashboard {
            max-width: 50%;
            max-height: 50%;
            margin-top: 10%;
        }
    </style>
@endsection
