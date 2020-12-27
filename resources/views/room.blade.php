@extends('layouts.mainlayout')

@section('content')
    <div class="spaceRow"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="spaceColumn"></div>

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12" style="padding-bottom: 35px;">
                        <h1 class="title is-1 has-text-centered">Search</h1>
                    </div>
                </div>

                <div class="row" style="background-color:#ffcc00; border-radius: 6px; height:325px; width:350px;">
                    <article>
                        <div class="content" style="padding-top: 25px; padding-left: 20px;">
                            <!-- Content -->

                            <label for="dateofcheckin">Check-in</label>
                            <input type="date" name="dateofcheckin" id="dateofcheckin">

                            <div class="space"></div>

                            <label for="dateofcheckout">Check-out</label>
                            <input type="date" name="dateofcheckout" id="dateofcheckout">

                            <div class="space"></div>

                            <div class="row">
                                <div class="column" style="align-self: center">
                                    <label for="numberofpeople"></label>
                                    <select name="numberofpeople" id="numberofpeople"
                                            style="width:120px; height:35px; border-radius:6px; box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.1); border: 1px solid #c4c4c4;">
                                        <option value="1">1 person</option>
                                        <option value="2">2 persons</option>
                                        <option value="3">3 persons</option>
                                        <option value="4">4 persons</option>
                                        <option value="6">5 persons</option>
                                        <option value="6">6 persons</option>
                                    </select>
                                </div>

                                <div class="column" style="padding-left: 70px;">
                                    <label for="numberofrooms"> </label>
                                    <select name="numberofrooms" id="numberofrooms"
                                            style="width:120px; height:35px; border-radius:6px; box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.1); border: 1px solid #c4c4c4;">
                                        <option value="1">1 room</option>
                                        <option value="2">2 rooms</option>
                                        <option value="3">3 rooms</option>
                                    </select>
                                </div>
                            </div>
                            <div style="padding-top: 15px">
                                <button type="button"
                                        style="width:300px; height:35px; border-radius:6px; background-color:#4da6ff; color: black;">
                                    Search
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="spaceColumn"></div>
            <div class="col-lg-7" id="centerbar">
                <h1 class="title is-1 has-text-centered">Photo</h1>
                <div class="row">
                    <div class="column">
                        <img src="http://placehold.it/350x150/69D2E7/ffffff">
                        <img src="http://placehold.it/250x150/69D2E7/ffffff">
                        <img src="http://placehold.it/150x150/69D2E7/ffffff">
                    </div>
                    <div class="column">
                        <img src="http://placehold.it/350x250/69D2E7/ffffff">
                        <img src="http://placehold.it/250x150/69D2E7/ffffff">
                        <img src="http://placehold.it/150x150/69D2E7/ffffff">
                    </div>
                    <div class="column">
                        <img src="http://placehold.it/450x250/69D2E7/ffffff">
                        <img src="http://placehold.it/150x150/69D2E7/ffffff">
                        <img src="http://placehold.it/150x150/69D2E7/ffffff">
                    </div>
                    <div class="column">
                        <img src="http://placehold.it/250x250/69D2E7/ffffff">
                        <img src="http://placehold.it/250x150/69D2E7/ffffff">
                        <img src="http://placehold.it/150x150/69D2E7/ffffff">
                    </div>
                </div>

            </div>
        </div>
        <div class="spaceColumn"></div>
    </div>

    <div class="spaceRow"></div>

    <div class="divider"><span></span><span>Informations</span><span></span></div>

    <div class="container-fluid">
        <div class="row">


        </div>
    </div>
@endsection

<style>
    .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem;
    }

    .card-signin .card-body {
        padding: 2rem;
    }

    .form-signin {
        width: 100%;
    }

    .form-signin .btn {
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s;
    }

    .spaceRow {
        margin: 50px 0;
    }

    .spaceColumn {
        margin: 0 40px;
    }

    .space {
        margin: 5px 0;
    }

    .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        padding: 0 4px;
    }

    /* For the photo section*/


    /* Create four equal columns that sits next to each other */
    .column {
        -ms-flex: 25%; /* IE10 */
        flex: 25%;
        max-width: 35%;
        padding: 0 4px;
    }

    .column img {
        margin: 10px;
        vertical-align: middle;
        width: 100%;
    }

    /* Responsive layout - makes a two column-layout instead of four columns */
    @media screen and (max-width: 800px) {
        .column {
            -ms-flex: 50%;
            flex: 50%;
            max-width: 50%;
        }
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .column {
            -ms-flex: 100%;
            flex: 100%;
            max-width: 100%;
        }
    }

    /* End photo section*/

    /* For the divider*/

    .divider { /* minor cosmetics */
        display: table;
        font-size: 24px;
        text-align: center;
        width: 75%; /* divider width */
        margin: 40px auto; /* spacing above/below */
    }

    .divider span {
        display: table-cell;
        position: relative;
    }

    .divider span:first-child, .divider span:last-child {
        width: 50%;
        top: 20px; /* adjust vertical align */
        -moz-background-size: 100% 2px; /* line width */
        background-size: 100% 2px; /* line width */
        background-position: 0 0, 0 100%;
        background-repeat: no-repeat;
    }

    .divider span:first-child { /* color changes in here */
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(transparent), to(#000));
        background-image: -webkit-linear-gradient(180deg, transparent, #000);
        background-image: -moz-linear-gradient(180deg, transparent, #000);
        background-image: -o-linear-gradient(180deg, transparent, #000);
        background-image: linear-gradient(90deg, transparent, #000);
    }

    .divider span:nth-child(2) {
        color: #000;
        padding: 0px 5px;
        width: auto;
        white-space: nowrap;
    }

    .divider span:last-child { /* color changes in here */
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#000), to(transparent));
        background-image: -webkit-linear-gradient(180deg, #000, transparent);
        background-image: -moz-linear-gradient(180deg, #000, transparent);
        background-image: -o-linear-gradient(180deg, #000, transparent);
        background-image: linear-gradient(90deg, #000, transparent);
    }

    /* end of divider */

    /* date picker */
    [type="date"] {
        background: #fff url(https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png) 97% 50% no-repeat;
    }

    [type="date"]::-webkit-inner-spin-button {
        display: none;
    }

    [type="date"]::-webkit-calendar-picker-indicator {
        opacity: 0;
    }

    /* custom styles */
    body {
        padding: 4em;
        background: #e5e5e5;
        font: 13px/1.4 Geneva, 'Lucida Sans', 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif;
    }

    label {
        display: block;
    }

    input {
        border: 1px solid #c4c4c4;
        border-radius: 5px;
        background-color: #fff;
        padding: 3px 5px;
        box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.1);
        width: 300px;
    }
</style>
