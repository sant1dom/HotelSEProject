@extends('layouts.mainlayout')
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>I miei ospiti</h2>
            </div>
        </div>

        <table class="table table-bordered">
            <tr>
                <th> No</th>
                <th>Name</th>
                <th>Surname</th>
                <th></th>
            </tr>

            @foreach ($guests as $guest)

                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $guest->name }}</td>
                    <td>{{ $guests->surname }}</td>
                    <td>

                        <form action="{{ route('guests.show',$service->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>
                            @method('SHOW')
                            <button type="submit" class="btn btn-danger">Show</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>



