<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $heading }}</title>
    {{-- FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('client/css/main.css') }}">
    @if (Request::is('/'))
        <link rel="stylesheet" href="{{ asset('client/css/index.css') }}">
    @elseif(Request::is('about-us'))
        <link rel="stylesheet" href="{{ asset('client/css/about.css') }}">
    @elseif(Request::is('vehicles/*') || Request::is('spare-parts/*'))
        <link rel="stylesheet" href="{{ asset('client/css/product-show.css') }}">
    @endif
</head>

<body>
    <div class="wrapper">
        @include('client.partials._header')
        <main class="main">@yield('content')</main>
        @include('client.partials._footer')
    </div>

    @include('client.partials._toast')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.js"
        integrity="sha512-x6oUSDeai/Inb/9HFvbrBtDOnLvFSd37f6j2tKRePhFBLYAezejnN5xgG52M20rnFN66+6EWwuFwAneEXyq6oA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
