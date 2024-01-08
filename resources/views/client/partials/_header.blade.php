<header class="header">
    <div class="box header__inner">
        <a href="{{ route('home') }}">
            <img src="{{ asset('client/media/logo-blue.svg') }}" alt="Logo" class="logo">
        </a>
        <nav class="header__nav">
            @foreach ($services as $service)
                <a href="{{ route('service.index', ['service_slug' => $service['slug']]) }}"
                    class="header__navlink {{ Request::is($service['slug']) ? 'active' : '' }}">
                    {{ $service['name'][$locale] }}
                </a>
            @endforeach
            <a href="{{ route('about') }}" class="header__navlink {{ Request::is('about-us') ? 'active' : '' }}">
                Biz haqimizda
            </a>
            <a href="{{ route('contacts') }}" class="header__navlink {{ Request::is('contacts') ? 'active' : '' }}">
                Kontaktlar
            </a>
        </nav>
    </div>
</header>
