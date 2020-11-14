@extends('layouts/auth')

@section('page', 'Login')

@push('scripts')
    <script src="{{ asset('js/login.js') }}"></script>
@endpush

@section('form', 'formLogin')
@section('message', 'Please sign in')
@section('button', 'Sign in')

@section('fields')
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control top" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control bottom" placeholder="Password" required>
@endsection

@section('text')
    <a href="{{ url('register') }}">Need a calendar? Sign up</a>
@endsection
