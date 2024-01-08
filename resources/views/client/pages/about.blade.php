@extends('client.partials._layout')

@section('seo')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"
        integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('client/css/about.css') }}">
    <title>Alpha motors | Biz haqimizda</title>
@endsection

@section('content')
    @include('client.partials._breadcrumb', ['title' => 'Biz haqimizda', 'parent' => null])
    <section class="section-md">
        <div class="box about-inner">
            <div class="inner-textside">
                <p>
                    Alpha Motors and Parts is a used car dealer operating in England and Wales. Our agents will be happy to
                    provide you with all the information you need and make an appointment both physically and online. All
                    cars are sold with a guarantee a month for engine and gearbox. In addition, you can order any auto parts
                    you are looking for from us. We distribute directly from the manufacturer and official suppliers. Any
                    non-standard or non-market parts are available subject to availability from our partner companies.</p>
                </p>
                <p>
                    Our board of directors inspires, motivates and guides the organisation to greater success by defining
                    new and exciting horizons to scale. Senior leadership, comprising eminent industry experts who bring a
                    wealth of knowledge, works to achieve the vision and mission of the organisation by setting high
                    standards of performance and excellence.
                </p>
            </div>
            <div class="inner-imageside">
                <img src="{{ asset('client/media/about-us.jpg') }}" alt="About us image" class="image">
            </div>
        </div>
    </section>
    @if (count($faqs) > 0)
        <section class="section-md">
            <div class="box faq-inner">
                <div class="section-content">
                    <h3 class="section-title">FAQ</h3>
                </div>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach ($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse-{{ $faq['id'] }}" aria-expanded="false"
                                    aria-controls="flush-collapse-{{ $faq['id'] }}">
                                    {{ $faq['question'][$locale] }}
                                </button>
                            </h2>
                            <div id="flush-collapse-{{ $faq['id'] }}" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    {{ $faq['answer'][$locale] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @include('client.partials._form')
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"
        integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
