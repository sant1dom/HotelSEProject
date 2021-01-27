<td>
    <div class="btn-group dropright" role="group">
        <button type="button"
                class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </button>
        <div class="dropdown-menu">
            @foreach($booking->guests as $guest)
                <option value="{{$guest->id}}">
                    {{$guest->name}}{{$guest->surname}}
                </option>
            @endforeach
        </div>
    </div>
</td>
<td>
    <div class="btn-group dropright" role="group">
        <button type="button"
                class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </button>
        <div class="dropdown-menu">
            @foreach($booking->services as $services)
                <option value="{{$services->id}}">
                    {{$services->name}}
                </option>
            @endforeach
        </div>
    </div>
</td>

