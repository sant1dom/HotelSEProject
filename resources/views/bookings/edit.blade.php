@extends('layouts.mainlayout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h4 class="title text-light font-weight-bold" style="font-size:4vw;">
                    My booking
                </h4>
            </div>
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
        </div>
    </section>
    <br>
    <div class="bootstrap-iso">
        <div class="row d-flex justify-content-center"
             style="background-color: white; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);">
            <div class="col-sm has-text-centered"
                 style="margin: 2rem; vertical-align: middle;">
                {{dd($room)}}
                <h1>{{$room->type}}</h1>
                <br>
                <p>{{$room->description}}</p>
                <br>
                <div class="row has-text-centered bottomLine">
                    <p>For max {{$room->capacity}} people. Price per
                        person: {{$room->price}}€
                    </p>
                </div>
            </div>
            <div class="col-sm has-text-centered" style="margin: 2rem;">
                <h1>Services:</h1>
                @foreach($servicesName as $i=> $serviceName)
                    <p>-{{$serviceName->name}}. For days:
                        @foreach($services as $i=> $service)
                            @if($service->name === $serviceName->name)
                                {{$service->pivot->date}}
                            @endif
                        @endforeach
                    </p>
                @endforeach
            </div>
        </div>
        <br>
    </div>

    <style>
        .alert {
            position: absolute;
            left: 50%;
            bottom: 0%;
            width: 60%;
            transform: translate(-50%, -50%);
            z-index: 999;
        }

        .hero-body {
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 40%), url("https://www.atlantis.com/-/media/atlantis/dubai/atp/resort/exterior/AtlantisThePalm-Exterior-FrontShotWithRoyalPool.jpg?sc_lang=it");
            background-position: center bottom;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
            height: 20rem;
        }

        .row.has-text-centered.bottomLine {
            position: absolute;
            bottom: auto;
            left: 50%;
            top: 100%;
            transform: translate(-50%, -50%);
            margin: auto;
        }
    </style>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection


