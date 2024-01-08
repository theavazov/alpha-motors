@extends('app.partials._layout')

@section('content')
    <div class="page-top">
        <h1 class="page-title">{{ $title }}</h1>
    </div>
    @include('app.partials._breadcrumb')
    <div class="page-content">
        <form method="POST" action="{{ route('services.update', ['id' => $object['id']]) }}" class="form">
            @csrf
            @method('PUT')
            @if ($langs && count($langs) > 0)
                <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach ($langs as $lang)
                        <button class="nav-link" id="nav-{{ $lang['code'] }}-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-{{ $lang['code'] }}" type="button" role="tab"
                            aria-controls="nav-{{ $lang['code'] }}" aria-selected="true">
                            {{ $lang['name'] }}
                        </button>
                    @endforeach
                </nav>
                <div class="tab-content">
                    @foreach ($langs as $lang)
                        <div class="tab-pane fade" id="nav-{{ $lang['code'] }}" role="tabpanel"
                            aria-labelledby="nav-{{ $lang['code'] }}-tab" tabindex="0">
                            <div class="c-input-div">
                                <p>
                                    Название
                                    @if ($lang['code'] == $locale['code'])
                                        <span class="c-required">*</span>
                                    @endif
                                </p>
                                <input type="text" placeholder="Название" name="name_{{ $lang->code }}"
                                    value='{{ old("name_$lang->code") ? old("name_$lang->code") : $object['name'][$lang->code] }}' />
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="c-input-div mt">
                <p>
                    Иконка <span class="c-required">*</span>
                </p>
                <input type="text" name="icon" placeholder="Иконка"
                    value="{{ old('icon') ? old('icon') : $object['icon'] }}">
                @error('icon')
                    <span class="c-error-input">{{ $message }}</span>
                @enderror
            </div>
            <div class="c-form-buttons">
                <a href="{{ route('services.index') }}" class="c-btn-secondary">Отмена</a>
                <button type="submit" class="c-btn">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
