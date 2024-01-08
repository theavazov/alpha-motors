@extends('client.partials._layout')

@section('seo')
    <title>Alpha motors | {{ $service['name'][$locale] }}</title>
@endsection

@section('content')
    @include('client.partials._breadcrumb', ['title' => $service['name'][$locale], 'parent' => null])
@endsection
