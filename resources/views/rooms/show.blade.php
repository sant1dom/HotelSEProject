@extends('layouts.mainlayout')

@section('content')
    <div class="bootstrap-iso">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 my-2 mx-3">
                    <h1 class="text-center">Search</h1>
                    <div class="my-4 bg-warning rounded">
                        <div class="card-body">
                            <form method="post" action="/room">
                                @csrf
                                <div class="form-group">
                                    <label for="startDate">Start Date: </label>
                                    <input id="startDate" type="date"
                                           class="form-control @error('date') is-invalid @enderror" name="email"
                                           value="{{ old('date') }}"/>
                                    <label for="endDate">End Date: </label>
                                    <input id="endDate" type="date"
                                           class="form-control @error('date') is-invalid @enderror" name="email"
                                           value="{{ old('date') }}"/>

                                    <div class="row">
                                        <div class="col my-2">
                                            <label class="control-label " for="select">
                                                N° of people
                                            </label>
                                        </div>
                                        <div class="col my-2">
                                            <label class="control-label" for="select">
                                                N° of rooms
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <select class="select form-control" id="select" name="select">
                                                <option value="1">
                                                    1
                                                </option>
                                                <option value="2">
                                                    2
                                                </option>
                                                <option value="3">
                                                    3
                                                </option>
                                                <option value="4">
                                                    4
                                                </option>
                                                <option value="5">
                                                    5
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="select form-control" id="select" name="select">
                                                <option value="1">
                                                    1
                                                </option>
                                                <option value="2">
                                                    2
                                                </option>
                                                <option value="3">
                                                    3
                                                </option>
                                                <option value="4">
                                                    4
                                                </option>
                                                <option value="5">
                                                    5
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase text-center"
                                        type="submit">
                                    SUBMIT
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 my-2 mx-3">
                    <div class="row d-flex justify-content-center">
                        <h1 class="text-center">Gallery</h1>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div id="carouselExampleIndicators" class="carousel slide w-50 p-4" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php $i = 0;?>
                                @foreach ($room->images as $image):
                                <?php if ($i == 0) {
                                    $set_ = 'active';
                                } else {
                                    $set_ = '';
                                } ?>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="{{$set_}}"></li>
                                <?php $i++;?>
                                @endforeach
                            </ol>

                            <div class='carousel-inner'>
                                <?php $i = 0;?>
                                @foreach ($room->images as $image):
                                <?php if ($i == 0) {
                                    $set_ = 'active';
                                } else {
                                    $set_ = '';
                                } ?>
                                <div class='carousel-item <?php echo $set_; ?>'>
                                    <img src='{{$image->path}}' class='d-block w-100 img-responsive'>
                                </div>
                                <?php $i++;?>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon"  aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    .carousel-control-next, .carousel-control-prev, .carousel-indicators /*, .carousel-indicators */ {
    filter: invert(100%);
    }
</style>
@endsection
