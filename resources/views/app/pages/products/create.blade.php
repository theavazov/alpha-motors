@extends('app.partials._layout')

@section('content')
    <div class="page-top">
        <h1 class="page-title">{{ $title }}</h1>
    </div>
    @include('app.partials._breadcrumb')
    <form method="POST" action="{{ route('products.store') }}" class="c-form c-form-grid-3-1" enctype="multipart/form-data">
        @csrf
        <div style="grid-column: span 2;">
            <div class="page-content">
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
                                <div class="c-input-div mt">
                                    <p>
                                        Название
                                        @if ($lang['code'] == $locale)
                                            <span class="c-required">*</span>
                                        @endif
                                    </p>
                                    <input type="text" placeholder="Название" name="name_{{ $lang->code }}"
                                        value='{{ old("name_$lang->code") }}' />
                                </div>
                                <div class="c-input-div mt">
                                    <p>Подзаголовок</p>
                                    <input type="text" placeholder="Название" name="name_{{ $lang->code }}"
                                        value='{{ old("name_$lang->code") }}' />
                                </div>
                                <div class="c-input-div mt">
                                    <p>Описание</p>
                                    <textarea class="editor" name="description_{{ $lang->code }}" cols="30" rows="6">
                                        {{ old("description_$lang->code") }}
                                    </textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div style="grid-column: span 1;">
            <div class="page-content">
                <div class="c-input-div">
                    <p>Цена <span class="c-required">*</span></p>
                    <input type="text" placeholder="Цена" name="price" value='{{ old('price') }}' />
                    @error('price')
                        <span class="c-error-input">{{ $message }}</span>
                    @enderror
                </div>
                <div class="c-input-div mt">
                    <p>Выберите сервис <span class="c-required">*</span></p>
                    <select name="service_id">
                        <option value="*" selected disabled>---</option>
                        @foreach ($services as $service)
                            <option value="{{ $service['id'] }}">{{ $service['name'][$locale] }}</option>
                        @endforeach
                    </select>
                    @error('price')
                        <span class="c-error-input">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div style="grid-column: span 3; margin-top: 0px !important;" class="page-content">
            <div class="c-input-div">
                <p>Изображение</p>
                <div id="product-image" class="dropzone c-dropzone" data-key="product-images" data-url="/file/upload"
                    data-max="2" data-delete="/file/delete"></div>
                @error('price')
                    <span class="c-error-input">{{ $message }}</span>
                @enderror
            </div>
            <div class="c-form-buttons mt">
                <a href="{{ route('products.index') }}" class="c-btn-secondary">Отмена</a>
                <button type="submit" class="c-btn">Сохранить</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    {{-- <script src="{{ asset('app/js/dropzone.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            Dropzone.autoDiscover = false;
            $("#product-image").dropzone({
                url: "hn_SimpeFileUploader.ashx",
                addRemoveLinks: true,
                success: function(file, response) {
                    var imgName = response;
                    file.previewElement.classList.add("dz-success");
                    console.log("Successfully uploaded :" + imgName);
                },
                error: function(file, response) {
                    file.previewElement.classList.add("dz-error");
                }
            });
        });
    </script>
@endsection
