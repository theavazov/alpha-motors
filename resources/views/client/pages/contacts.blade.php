@extends('client.partials._layout')

@section('seo')
    <title>Alpha motors | Kontaktlar</title>
@endsection

@section('content')
    @include('client.partials._breadcrumb', ['title' => 'Kontaktlar', 'parent' => null])
    @include('client.partials._form')
@endsection
