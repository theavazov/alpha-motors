<aside class="sidebar">
    <a href="{{ route('admin') }}" class="logo">Dashboard</a>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <a href="{{ route('applications.index') }}"
            class="sidenav-link {{ Request::is('admin/applications') ? 'active' : '' }}">
            <div>
                <img src="{{ asset('app/icons/applications.svg') }}" alt="icon" />
                Заявки с сайта
            </div>
        </a>
        {{-- <div class="accordion-item">
            <div class="sidenav-link accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#settings" aria-expanded="false" aria-controls="settings">
                    <div>
                        <img src="/admin/icons/settings.svg" alt="icon" />
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
                    <a href="/admin/siteinfo">Общие данные</a>
                    <a href="/admin/languages">Языки</a>
                    <a href="/admin/translations">Переводы</a>
                </div>
            </div>
        </div> --}}
    </div>
</aside>
