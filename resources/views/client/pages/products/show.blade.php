@extends('client.partials._layout')

@section('seo')
    <title>Alpha motors | show</title>
@endsection

@section('content')
    @include('client.partials._breadcrumb', ['title' => '', 'parent' => ['title' => '', 'path' => '']])
@endsection
