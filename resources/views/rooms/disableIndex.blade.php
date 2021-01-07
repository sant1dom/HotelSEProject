@extends('layouts.admin-layout')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <div class="">
        <div class="row mx-auto my-2">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Room List</h2>
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
                <th>Room number</th>
                <th>Availability</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($rooms as $i => $room)
                <tr style="background-color: {{ $i % 2 == 0 ? '#d7f5f3': '#FFFFFF' }};">
                    <td>{{ $room->type }}</td>
                    <td id="numroom">{{ $room->numroom }}</td>
                    @if($room->availability == 1)
                        <td>{{__('Available')}}</td>
                    @else
                        <td>{{__('Not available')}}</td>
                    @endif
                    <td>

                        <input class="" id="availability" name="availability" type="checkbox"
                               @if($room->availability===1)
                               checked
                               @endif
                               data-toggle="toggle" data-style="ios"
                               data-on="Yes" data-off="No" data-onstyle="success"
                               data-offstyle="danger">

                        <button type="button save" class="btn btn-success" id="save">Update</button>

                    </td>
                </tr>
            @endforeach
        </table>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
    </div>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).on("click", "button.save", function () {
            alert('caio');
            e.preventDefault(); //Prevent page from submiting
            var availability = $("input[name=availability]").val();
            var numroom = document.getElementById('numroom').textContent;
            if (availability === 'On') {
                availability = 1;
            } else {
                availability = 0;
            }

            $.ajax({

                type: "POST",
                url: "{{ route('rooms.disable') }}",
                data: {_token: CSRF_TOKEN, availability: availability, numroom: numroom},
                success: function (data) {
                    alert(data.success());
                },
                error: function () {
                }
            });

        });
    </script>
@endsection
