<nav class="c-breadcrumb">
    <a href="{{ route('admin') }}" class="c-breadcrumb-element">Главная</a>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
        <path fill-rule="evenodd"
            d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
            clip-rule="evenodd" />
    </svg>
    @if ($breadcrumb)
        <a href="{{ $breadcrumb['path'] }}" class="c-breadcrumb-element">{{ $breadcrumb['title'] }}</a>
        <i class="bi bi-chevron-right"></i>
    @endif
    <p class="c-breadcrumb-element">{{ $title }}</p>
</nav>
