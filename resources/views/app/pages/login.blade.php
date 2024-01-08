<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- GOOGLE FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('app/css/login.css') }}">
    <style>
        .c-toast {
            position: fixed;
            top: 20px;
            right: 16px;
            z-index: 4;
            padding: 20px;
            font-size: 16px;
            line-height: 20px;
            color: #fff;
            border-radius: 4px;
        }

        .c-toast.success {
            background-color: #2ec936;
        }

        .c-toast.error {
            background-color: #c92e2e;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="content">
            <h1 class="title">Логин</h1>
            <form method="POST" action="{{ route('login.store') }}" class="form">
                @csrf
                <div class="input-wrapper">
                    <input type="text" id="name" name="name" class="input" placeholder="Имя">
                    @error('name')
                        <span class="input-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-wrapper">
                    <input type="password" name="password" class="input" placeholder="Пароль">
                    @error('username')
                        <span class="input-error">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="button">Войти</button>
            </form>
        </div>
        @if (session()->has('message'))
            <p class="c-toast {{ session('success') == true ? 'success' : 'error' }}" x-data="{ toast: true }"
                x-init="setTimeout(() => toast = false, 2000)" x-show="toast">
                {{ session('message') }}
            </p>
        @endif
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.js"
        integrity="sha512-x6oUSDeai/Inb/9HFvbrBtDOnLvFSd37f6j2tKRePhFBLYAezejnN5xgG52M20rnFN66+6EWwuFwAneEXyq6oA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
