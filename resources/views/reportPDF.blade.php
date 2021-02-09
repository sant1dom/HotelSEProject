<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body>

<div class="card dashboard">
    <div>
        <h5 class="card-header d-flex justify-content-center">
            User Data
        </h5>
        <table class="table table-fixed table-striped header-fixed" id="users">
            <thead style="position: sticky; top: 0" class="thead-dark">
            <tr>
                <th class="header has-text-centered" scope="col">Name</th>
                <th class="header has-text-centered" scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class=" has-text-centered">{{$user->name}}</td>
                <td class=" has-text-centered">{{$user->email}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <h5 class="card-header d-flex justify-content-center">
        Guests
    </h5>
    <div class="card-body">
        <div class="table-wrapper-scroll-y table-scrollbar">
            <table class="table table-fixed table-striped header-fixed table-bordered" id="guests">
                <thead class="thead-dark">
                <tr>
                    <th class="header has-text-centered" scope="col">Name</th>
                    <th class="header has-text-centered" scope="col">Surname</th>
                    <th class="header has-text-centered" scope="col">Birthday</th>
                </tr>
                </thead>
                <tbody id="table-guests-body">
                @foreach($guests as $guest)
                    <tr>
                        <td class=" has-text-centered">{{$guest->name}}</td>
                        <td class=" has-text-centered">{{$guest->surname}}</td>
                        <td class=" has-text-centered">{{$guest->birthdate}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <h5 class="card-header d-flex justify-content-center">
            Bookings
        </h5>
        <div class="card-body">
            <div class="table-wrapper-scroll-y table-scrollbar">
                <table class="table table-fixed table-striped header-fixed table-bordered" id="bookings"
                       style="">
                    <thead style="" class="thead-dark">
                    <tr>
                        <th class="header has-text-centered" scope="col">From</th>
                        <th class="header has-text-centered" scope="col">To</th>
                        <th class="header has-text-centered" scope="col">Booking Code</th>
                    </tr>
                    </thead>
                    <tbody id="table-guests-body">
                    @foreach($bookings as $booking)
                        <tr>
                            <td class=" has-text-centered">{{$booking->from}}</td>
                            <td class=" has-text-centered">{{$booking->to}}</td>
                            <td class=" has-text-centered">{{$booking->booking_code}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
    }
</style>

