@extends('app.partials._layout')

@section('content')
    <div class="page-top">
        <h1 class="page-title">{{ $title }}</h1>
    </div>
    @include('app.partials._breadcrumb')
@endsection
