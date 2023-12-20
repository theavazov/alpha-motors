@extends('app.partials._layout')

@section('content')
    <div class="page-top">
        <h1 class="page-title">{{ $title }}</h1>
    </div>
    @include('app.partials._breadcrumb')
    <div class="page-content">
        @if (count($data) > 0)
            <table class="c-table">
                <thead>
                    <tr class="c-table-row">
                        <th>№</th>
                        <th>ИМЯ</th>
                        <th>EMAIL</th>
                        <th>НОМЕР ТЕЛ.</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $object)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $object['full_name'] }}</td>
                            <td>{{ $object['email'] }}</td>
                            <td>{{ $object['phone_number'] }}</td>
                            <td>
                                <div class="events-td">
                                    <a href="{{ route('applications.destroy', ['id' => $object['id']]) }}"
                                        class="event-btn delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            @include('app.partials._empty')
        @endif
    </div>
@endsection
