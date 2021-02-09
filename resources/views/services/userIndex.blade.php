@extends('layouts.mainlayout')

@section('content')
    <section class="hero is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h4 class="title text-light font-weight-bold" style="font-size:4vw;">
                    Our services
                </h4>
            </div>
        </div>
    </section>
<br><br>
    <div class="bootstrap-iso">
        @if($services)
            @foreach($services as $j => $service)
                @if($j % 2 == 0)
                    <div class="row" style="background-color: white; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);">
                        <div class="col-sm has-text-centered serviceImage"
                             style="margin-left: 6rem; margin-top: 2rem; margin-bottom: 2rem; vertical-align: middle;">
                            <div id="carouselIndicators{{$j}}" class="carousel slide" data-interval="false" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php $i = 0;?>
                                    @foreach ($service->imageServices as $image)
                                        <?php if ($i == 0) {
                                            $set_ = 'active';
                                        } else {
                                            $set_ = '';
                                        } ?>
                                        <li data-target="#carouselIndicators{{$j}}" data-slide-to="{{$i}}"
                                            class="{{$set_}}"></li>
                                        <?php $i++;?>
                                    @endforeach
                                </ol>
                                <div class='carousel-inner'>
                                    <?php $i = 0;?>
                                    @foreach ($service->imageServices as $image)
                                        <?php if ($i == 0) {
                                            $set_ = 'active';
                                        } else {
                                            $set_ = '';
                                        } ?>
                                        <div class='carousel-item  <?php echo $set_; ?>'>
                                            <img src="/storage/{{$image->path}}" class='imageService' alt=""
                                                 style="margin: auto; object-fit: contain;">
                                        </div>
                                        <?php $i++;?>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselIndicators{{$j}}" role="button"
                                   data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselIndicators{{$j}}" role="button"
                                   data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm" style="margin: 2rem; text-align: left;">
                            <div>
                                <h1>{{$service->name}}</h1>
                            </div>
                            <br>
                            <div>
                                <p>Price per person: {{$service->price}}€</p>
                            </div>
                        </div>
                        @else
                            <div class="col-sm" style="margin: 2rem; text-align: right">
                                <div>
                                    <h1>{{$service->name}}</h1>
                                </div>
                                <br>
                                <div>
                                    <p>Price per person: {{$service->price}}€</p>
                                </div>
                            </div>
                            <div class="col-sm has-text-centered serviceImage"
                                 style="margin-right: 6rem; margin-top: 2rem; margin-bottom: 2rem; vertical-align: middle;">
                                <div id="carouselIndicators{{$j}}" class="carousel slide" data-interval="false" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php $i = 0;?>
                                        @foreach ($service->imageServices as $image)
                                            <?php if ($i == 0) {
                                                $set_ = 'active';
                                            } else {
                                                $set_ = '';
                                            } ?>
                                            <li data-target="#carouselIndicators{{$j}}" data-slide-to="{{$i}}"
                                                class="{{$set_}}"></li>
                                            <?php $i++;?>
                                        @endforeach
                                    </ol>
                                    <div class='carousel-inner'>
                                        <?php $i = 0;?>
                                        @foreach ($service->imageServices as $image)
                                            <?php if ($i == 0) {
                                                $set_ = 'active';
                                            } else {
                                                $set_ = '';
                                            } ?>
                                            <div class='carousel-item  <?php echo $set_; ?>'>
                                                <img src="/storage/{{$image->path}}" class='imageService img-responsive'
                                                     alt=""
                                                     style="margin: auto;">
                                            </div>
                                            <?php $i++;?>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselIndicators{{$j}}" role="button"
                                       data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselIndicators{{$j}}" role="button"
                                       data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                    </div>
                    <br><br>
                @endif
            @endforeach
        @endif
    </div>


    <style>
        .margin {
            height: 10rem;
            background-color: rgb(242, 242, 242);
        }

        .hero-body {
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 40%), url("https://www.atlantis.com/-/media/atlantis/dubai/atp/resort/exterior/AtlantisThePalm-Exterior-FrontShotWithRoyalPool.jpg?sc_lang=it");
            background-position: center bottom;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
            height: 20rem;
        }

        .imageService {
            width: 70%;
            height: 100%;
            transition: .5s ease;
            backface-visibility: hidden;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            box-shadow: 0 -3px 6px 2px rgba(0, 0, 0, 0.2);
        }

        .col-sm.has-text-centered.serviceImage {
            position: relative;
            width: 50%;
        }

        .carousel-control-next, .carousel-control-prev, .carousel-indicators {
            /* cambia il colore degli indicatori del carosello in nero */
            filter: invert(100%);
        }
    </style>
@endsection

