@extends('app')

@section('title', 'Login')


    @push('styles')
        <link type="text/css" rel="stylesheet" href="{{ asset('css/login.css') }}" />
    @endpush


    @push('scripts')
        <script src="{{ asset('js/login.js') }}"></script>
    @endpush


@section('content')
    <form class="form-signin text-center" method="POST" id="formLogin">
        <h1 class="h1 mb-3"><i class="mdi mdi-calendar"></i> Calendar App</h1>
        <h2 class="h4 mb-3 font-weight-normal">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control top" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control bottom" placeholder="Password" required>
        <div class="checkbox mb-3">
            <a href="{{ url('register') }}">Need a calendar? Sign up</a>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
@endsection
