@extends('layouts.mainlayout')

@section('content')
    <section class="hero is-fullheight is-bold">
        <div class="hero-body">
            <div class="container has-text-right">
                <h1 class="title has-text-white">Welcome to Hotel Name</h1>
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
                            <img
                                src="https://www.italianbark.com/wp-content/uploads/2018/01/hotel-room-design-trends-italianbark-interior-design-blog.jpg">
                        </figure>
                    </article>
                </div>
            </div>
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
                            <img
                                src="https://www.italianbark.com/wp-content/uploads/2018/01/hotel-room-design-trends-italianbark-interior-design-blog.jpg">
                        </figure>
                    </article>
                </div>
            </div>

            <div class="column">
                <div class="title is-parent">
                    <article class="tile is-child notification">
                        <figure class="image">
                            <img
                                src="https://www.italianbark.com/wp-content/uploads/2018/01/hotel-room-design-trends-italianbark-interior-design-blog.jpg">
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <div class="space"></div>

@endsection

<style>
    section.hero.is-bold {
        background-image: url("https://media-cdn.holidaycheck.com/w_1280,h_720,c_fill,q_80/ugc/images/e2f1eadb-1dfc-4ec3-9e44-4483aad249a4");
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }
    .space {
        margin: 50px 0;
    }
    .separator {
        display: flex;
        align-items: center;
        text-align: center;
    }
    .separator::before, .separator::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #000;
    }
    .separator::before {
        margin-right: .25em;
    }
    .separator::after {
        margin-left: .25em;
    }
</style>
