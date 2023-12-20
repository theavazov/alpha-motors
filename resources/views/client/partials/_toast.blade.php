@if (session()->has('message'))
    <p class="toast" x-data="{ open: false }" x-init="show = true;
    setTimeout(() => show = false, 2000)" x-show="show">{{ session('message') }}</p>
@endif
