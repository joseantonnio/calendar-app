@extends('app')

@section('title', 'Welcome')


@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/welcome.css') }}"/>
@endpush


@push('scripts')
    <script src="{{ asset('js/welcome.js') }}"></script>
@endpush


@section('content')
    <div id='wrap'>
        <div id='calendar'></div>
        <div style='clear:both'></div>
    </div>
@endsection
