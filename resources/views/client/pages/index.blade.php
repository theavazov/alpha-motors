@extends('client.partials._layout')

@section('content')
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
                <a href="/about-us" class="about__inner__content-side__button">Read More</a>
            </div>
            <div class="about__inner__image-side">
                <img src="{{ asset('client/media/about-us.jpg') }}" alt="about-us image" class="image">
            </div>
        </div>
    </section>

    @include('client.partials._form')
@endsection
