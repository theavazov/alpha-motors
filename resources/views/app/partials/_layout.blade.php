<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('app/media/favicon.svg') }}" type="image/x-icon">
    {{-- LIBRARIES --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.css"
        integrity="sha512-DanfxWBasQtq+RtkNAEDTdX4Q6BPCJQ/kexi/RftcP0BcA4NIJPSi7i31Vl+Yl5OCfgZkdJmCqz+byTOIIRboQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"
        integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" />
    {{-- GOOGLE FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    {{-- CSS --}}
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('app/css/main.css') }}" />
</head>

<body>
    <div class="wrapper">
        @include('app.partials._sidebar')
        <main class="main">
            @yield('content')
        </main>
        @include('app.partials._toast')
    </div>
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.js"
        integrity="sha512-x6oUSDeai/Inb/9HFvbrBtDOnLvFSd37f6j2tKRePhFBLYAezejnN5xgG52M20rnFN66+6EWwuFwAneEXyq6oA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"
        integrity="sha512-bUg5gaqBVaXIJNuebamJ6uex//mjxPk8kljQTdM1SwkNrQD7pjS+PerntUSD+QRWPNJ0tq54/x4zRV8bLrLhZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"
        integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('app/js/dropzone.js') }}"></script>
    <script src="{{ asset('app/js/tab.js') }}"></script>
    <script>
        NProgress.start();
        $(document).ready(() => {
            NProgress.done();
        });
    </script>
    <script src="{{ asset('app/js/ckeditor.js') }}"></script>
</body>

</html>
