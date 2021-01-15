@extends('layouts.admin-layout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <h4 class="title has-text-centered text-light font-weight-bold" style="font-size:3vw;">
                Contacts management
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
    </section>

    <link href="{{ asset('css/adminIndex.css') }}" rel="stylesheet">
@endsection

