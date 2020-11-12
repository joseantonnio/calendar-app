@extends('layouts/app')

@section('title')
    @yield('page')
@endsection

@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endpush

@section('content')
    <form class="form-signin text-center" method="POST" id="@yield('form')">
        <h1 class="h1 mb-3"><i class="mdi mdi-calendar"></i> Calendar App</h1>
        <h2 class="h4 mb-3 font-weight-normal">@yield('message')</h2>
        @yield('fields')
        <div class="checkbox mb-3">
            @yield('text')
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">@yield('button')</button>
    </form>
@endsection
