@extends('layouts.mainlayout')

@section('content')
    <section class="hero is-fullheight is-bold">
        <div class="hero-body">
            <div class="container has-text-right">
                <h1 class="title text-light font-weight-bold" style="font-size:8vw;">Welcome to <br/>Hotel Name</h1>
            </div>
        </div>
    </section>

    <div class="space"></div>
    <div class="separator"> <h1 class="title is-1 has-text-centered">Our Rooms</h1> </div>

    <div class="container" id="gallery">
        <div class="space"></div>
        <div class="columns has-text-centered">
            <div class="column">
                <div class="title is-parent">
                    <article class="tile is-child notification">
                        <p class="title">Camera Example</p>
                        <figure class="image inline-block">
                            <img
                                src="https://www.italianbark.com/wp-content/uploads/2018/01/hotel-room-design-trends-italianbark-interior-design-blog.jpg"
                                alt="">
                        </figure>
                    </article>
                </div>
            </div>

            <div class="column">
                <div class="title is-parent">
                    <article class="tile is-child notification">
                        <p class="title">Camera Example 2</p>
                        <figure class="image">
                            <img src="https://www.italianbark.com/wp-content/uploads/2018/01/hotel-room-design-trends-italianbark-interior-design-blog.jpg" alt="hotel-view">
                        </figure>
                    </article>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <button type="button"
                    class="btn btn-primary text-uppercase text-center"
                    onclick="location.href='{{ route('rooms.userIndex') }}'">
                SEE MORE
            </button>
        </div>
    </div>

    <div class="space"></div>

    <div class="separator"> <h1 class="title is-1 has-text-centered">Gallery</h1> </div>

    <div class="container" id="gallery">
        <div class="space"></div>
        <div class="columns">
            <div class="column">
                <div class="title is-parent">
                    <article class="tile is-child notification">
                        <figure class="image">
                            <img src="https://www.italianbark.com/wp-content/uploads/2018/01/hotel-room-design-trends-italianbark-interior-design-blog.jpg">
                        </figure>
                    </article>
                </div>
            </div>

            <div class="column">
                <div class="title is-parent">
                    <article class="tile is-child notification">
                        <figure class="image">
                            <img src="https://www.italianbark.com/wp-content/uploads/2018/01/hotel-room-design-trends-italianbark-interior-design-blog.jpg">
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <div class="space"></div>

@endsection

