@extends('app.partials._layout')

@section('content')
    <div class="page-top">
        <h1 class="page-title">{{ $title }}</h1>
    </div>
    @include('app.partials._breadcrumb')
    <div class="page-content">
        <form method="POST" action="{{ route('langs.update', ['id' => $object['id']]) }}" class="c-form">
            @csrf
            @method('PUT')
            <div class="c-form-grid">
                <div class="w-full">
                    <div class="c-input-div">
                        <p>Имя <span class="c-required">*</span></p>
                        <input type="text" placeholder="Имя" name="name" value="{{ $object['name'] }}" />
                        @error('name')
                            <span class="c-error-input">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="c-input-div mt">
                        <p>Код</p>
                        <input type="text" placeholder="Код" name="code" value="{{ $object['code'] }}" />
                        @error('code')
                            <span class="c-error-input">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="w-full">
                    <div class="c-input-div">
                        <p>По умолчанию</p>
                        <div class="form-check form-switch">
                            <input type="hidden" name="default_lang" value="0">
                            @if (count($data) > 0)
                                @if ($object['is_default'])
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" name="default_lang" disabled checked value="1" />
                                @else
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" name="default_lang" value="1" />
                                @endif
                            @else
                                <input class="form-check-input" type="checkbox" role="switch" checked
                                    id="flexSwitchCheckDefault" disabled name="default_lang" value="1" />
                            @endif
                        </div>
                    </div>
                    <div class="c-input-div mt">
                        <p>Активный</p>
                        @if ($object['is_active'])
                            <div class="form-check form-switch">
                                <input type="hidden" name="active" value="0">
                                <input class="form-check-input" type="checkbox" role="switch" checked
                                    id="flexSwitchCheckDefault" name="active" value="1" />
                            </div>
                        @else
                            <div class="form-check form-switch">
                                <input type="hidden" name="active" value="0">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                    name="active" value="1" />
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="c-form-buttons">
                <a href="{{ route('langs.index') }}" class="c-btn-secondary">Отмена</a>
                <button type="submit" class="c-btn">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
