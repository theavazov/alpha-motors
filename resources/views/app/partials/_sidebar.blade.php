<aside class="sidebar">
    <nav class="sidebar-inner">
        <a href="{{ route('admin') }}" class="logo">Dashboard</a>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <a href="{{ route('applications.index') }}"
                class="sidenav-link {{ Request::is('admin/applications') || Request::is('admin/applications/*') ? 'active' : '' }}">
                <div>
                    <img src="{{ asset('app/icons/applications.svg') }}" alt="icon" />
                    Заявки с сайта
                </div>
            </a>
            <a href="{{ route('services.index') }}"
                class="sidenav-link {{ Request::is('admin/services') || Request::is('admin/services/*') ? 'active' : '' }}">
                <div>
                    <img src="{{ asset('app/icons/services.svg') }}" alt="icon" />
                    Услуги
                </div>
            </a>
            {{-- <a href="{{ route('products.index') }}"
                class="sidenav-link {{ Request::is('admin/products') || Request::is('admin/products/*') ? 'active' : '' }}">
                <div>
                    <img src="{{ asset('app/icons/products.svg') }}" alt="icon" />
                    Продукты
                </div>
            </a> --}}
            <a href="{{ route('faq.index') }}"
                class="sidenav-link {{ Request::is('admin/faq') || Request::is('admin/faq/*') ? 'active' : '' }}">
                <div>
                    <img src="{{ asset('app/icons/faq.svg') }}" alt="icon" />
                    FAQ
                </div>
            </a>
            <div class="accordion-item">
                <div class="sidenav-link accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#settings" aria-expanded="false" aria-controls="settings">
                        <div>
                            <img src="/app/icons/settings.svg" alt="icon" />
                            Настройки
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" width="12" height="12">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
                <div id="settings" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body sidenav-accordion-body">
                        <a href="{{ route('langs.index') }}">Языки</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    {{-- <a href="{{ route('logout') }}" class="sidenav-link">
        <div>
            <img src="{{ asset('app/icons/logout.svg') }}" alt="icon" />
            Logout
        </div>
    </a> --}}
</aside>
