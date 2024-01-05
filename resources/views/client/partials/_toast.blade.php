@if (session()->has('message'))
    <p class="c-toast {{ session('success') == true ? 'success' : 'error' }}" x-data="{ toast: true }"
        x-init="setTimeout(() => toast = false, 2000)" x-show="toast">
        {{ session('message') }}
    </p>
@endif
