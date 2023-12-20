<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('client/css/main.css') }}">
</head>

<body>
    <div class="wrapper">
        @include('client.partials._header')
        <main class="main">@yield('content')</main>
        @include('client.partials._footer')
    </div>

    @include('client.partials._toast')
</body>

</html>