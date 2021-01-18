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
            Service Data
        </h5>
        <table class="table table-fixed table-striped header-fixed" id="users">
            <thead style="position: sticky; top: 0" class="thead-dark">
            <tr>
                <th class="header has-text-centered" scope="col">Name</th>
                <th class="header has-text-centered" scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class=" has-text-centered">{{$service->name}}</td>
                <td class=" has-text-centered">{{$service->price}} €</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <h5 class="card-header d-flex justify-content-center">
            Reports
        </h5>
        <div class="card-body">
            <div class="table-wrapper-scroll-y table-scrollbar">
                <table class="table table-fixed table-striped header-fixed table-bordered" id="bookings"
                       style="">
                    <thead style="" class="thead-dark">
                    <tr>
                        <th class="header has-text-centered" scope="col">Name</th>
                        <th class="header has-text-centered" scope="col">Surname</th>
                        <th class="header has-text-centered" scope="col">Birthday</th>
                        <th class="header has-text-centered" scope="col">Entered At</th>
                        <th class="header has-text-centered" scope="col">Birthday</th>
                    </tr>
                    </thead>
                    <tbody id="table-guests-body">
                    @foreach($reports as $report)
                        <tr>
                            <td class=" has-text-centered">{{$report->guest->name}}</td>
                            <td class=" has-text-centered">{{$report->guest->surname}}</td>
                            <td class=" has-text-centered">{{$report->guest->birthdate}}</td>
                            <td class=" has-text-centered">{{$report->enteredAt}}</td>
                            <td class=" has-text-centered">{{$report->exitAt}}</td>
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

