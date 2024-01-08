@extends('client.partials._layout')

@section('seo')
    <link rel="stylesheet" href="{{ asset('client/css/index.css') }}">
    <title>Alpha motors</title>
@endsection

@section('content')
    <section class="hero">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <section class="bg-blue">
        <div class="box about__inner">
            <div class="about__inner__content-side">
                <div class="about__inner__content-side__titles">
                    <h3 class="section-title" style="color: var(--white)">About company</h3>
                    <p>Alpha Motors and Parts is a used car dealer operating in England and Wales. Our agents will be happy
                        to provide you with all the information you need and make an appointment both physically and online.
                        All cars are sold with a guarantee a month for engine and gearbox. In addition, you can order any
                        auto parts you are looking for from us. We distribute directly from the manufacturer and official
                        suppliers. Any non-standard or non-market parts are available subject to availability from our
                        partner companies.</p>
                </div>
                <a href="{{ route('about') }}" class="about__inner__content-side__button">Read More</a>
            </div>
            <div class="about__inner__image-side">
                <img src="{{ asset('client/media/about-us.jpg') }}" alt="about-us image" class="image">
            </div>
        </div>
    </section>

    @include('client.partials._form')
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            speed: 1200,
        });
    </script>
@endsection
