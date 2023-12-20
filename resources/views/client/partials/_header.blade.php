<header class="header">
    <div class="box header__inner">
        <a href="/">
            <img src="{{ asset('client/media/logo-blue.svg') }}" alt="Logo" class="logo">
        </a>
        <nav class="header__nav">
            <a href="/vehicles"
                class="header__navlink {{ Request::is('vehicles') || Request::is('vehicles/*') ? 'active' : '' }}">Vehicles</a>
            <a href="/spare-parts"
                class="header__navlink {{ Request::is('spare-parts') || Request::is('spare-parts/*') ? 'active' : '' }}">Spare
                parts</a>
            <a href="/about-us" class="header__navlink {{ Request::is('about-us') ? 'active' : '' }}">About us</a>
            <a href="/contacts" class="header__navlink {{ Request::is('contacts') ? 'active' : '' }}">Contacts</a>
        </nav>
    </div>
</header>
