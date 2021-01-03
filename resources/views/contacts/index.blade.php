@extends('layouts.admin-layout')
@section('content')
    <div class="">
        <div class="row mx-auto my-2">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Contact List</h2>
                </div>

                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('contacts.create') }}"> Create New Service</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered mx-2">
            <tr>
                <th>Type</th>
                <th>Contact String</th>
                <th width="280px">Action</th>
            </tr>

            @foreach ($contacts as $i => $contact)

                <tr style="background-color: {{ $i % 2 == 0 ? '#d7f5f3': '#FFFFFF' }};">
                    <td>{{ $contact->type }}</td>
                    <td>{{ $contact->contact_string }}</td>
                    <td>
                        <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('contacts.show',$contact->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {!! $contacts->links() !!}
        </div>
    </div>
@endsection

