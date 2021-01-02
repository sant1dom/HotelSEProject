@extends('layouts.mainlayout')
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>My Guests</h2>
            </div>
        </div>

        <table class="table table-bordered mx-2">
            <!-- columns width -->
            <colgroup>
                <col style="width: 30%;">
                <col style="width: 30%;">
                <col style="width: 25%;">
                <col style="width: 15%;">
            </colgroup>

            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Added on</th>
                <th></th>
            </tr>

            @foreach ($guests as  $i =>$guest)

                <tr style="background-color: {{ $i % 2 == 0 ? '#d7f5f3': '#FFFFFF' }};">
                    <td>{{ $guest->name }}</td>
                    <td>{{ $guest->surname }}</td>
                    <td>{{ $guest->created_at }}</td>
                    <td>
                        <button type="button" class="btn btn-primary text-uppercase text-center"
                                onclick="location.href='{{ route('guests.show', $guest) }}'">
                            SEE MORE
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection


