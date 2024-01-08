@extends('app.partials._layout')

@section('content')
    <div class="page-top">
        <h1 class="page-title">{{ $title }}</h1>
        <a href="{{ route('products.create') }}" class="c-btn">Добавить</a>
    </div>
    @include('app.partials._breadcrumb')
    <div class="page-content">
        @if (count($data) > 0)
            <table class="c-table">
                <thead>
                    <tr class="c-table-row">
                        <th>№</th>
                        <th>Название</th>
                        <th>Изображение</th>
                        <th>АКТИВНЫЙ</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        @else
            @include('app.partials._empty')
        @endif
    </div>
@endsection
