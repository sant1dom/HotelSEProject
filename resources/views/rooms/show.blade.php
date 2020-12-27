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
                                        <input id="startDate" type="date" class="form-control @error('date') is-invalid @enderror" name="email" value="{{ old('date') }}"/>
                                    <label for="endDate">End Date: </label>
                                        <input id="endDate" type="date" class="form-control @error('date') is-invalid @enderror" name="email" value="{{ old('date') }}"/>

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
            </div>
        </div>
    </div>
@endsection
