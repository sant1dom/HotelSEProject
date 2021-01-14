@extends('layouts.mainlayout')

@section('content')
    <?php
    $rooms = App\Models\Room::get()->unique('type');
    $guests = App\Models\Guest::all();
    $services = App\Models\Service::all();
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <div class="card booking-form-inner mx-5 my-5">
        <div class="card-body">
            <div class="separator"><h4 class=" has-text-centered">Services</h4></div>
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center mx-3">
                        <select
                            class="my-select dropdown show-tick  @error('service') is-invalid @enderror"
                            multiple
                            data-live-search="true"
                            name="service[]"
                            form="main-form" id="services"
                            title="Choose the services you want"
                            data-style="btn-info" data-width="100%"
                            data-size="10"
                            data-actions-box="true" data-container="body">
                            @if($services)
                                @foreach($services as $service)
                                    <option
                                        value="{{$service->id }}">{{$service->name}}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid my-4" id="servicesContainer">


    </div>


    <script>
        $(function () {
            $('.my-select').selectpicker();
        });

        $(document).on("change", "#services", function () {
            let serviceSelect = document.querySelector('#services');
            let selected = Array.from(serviceSelect.options).filter(function (option) {
                return option.selected;
            }).map(function (option) {
                return option.text;
            });

            let servicesContainer = document.querySelector('#servicesContainer');
            let serviceContainerChild = Array.from(servicesContainer.childNodes);
            serviceContainerChild.forEach(function (child) {
                child.remove();
            });

            selected.forEach(function (option) {
                $("#servicesContainer").append('<label>' +
                    option +
                    '</label id="' + option + '">' +
                    '<div class="card">' +
                    '<div class="card-body">' +
                    '@for($i=0; $i<10; $i++)' +
                    '<div class="form-check form-check-inline">' +
                    '<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">' +
                    '<label class="form-check-label" for="inlineCheckbox1">1</label>' +
                    '</div>' +
                    '@endfor' +
                    '</div>' +
                    '</div>'
                );
            });
        });
    </script>
@endsection
