@extends('app')

@section('title', 'Login')


    @push('styles')
        <link type="text/css" rel="stylesheet" href="{{ asset('css/login.css') }}" />
    @endpush


    @push('scripts')
        <script src="{{ asset('js/register.js') }}"></script>
    @endpush


@section('content')
    <form class="form-signin text-center">
        <h1 class="h1 mb-3"><i class="mdi mdi-calendar"></i> Calendar App</h1>
        <h2 class="h4 mb-3 font-weight-normal">Sign Up</h2>
        <label for="inputName" class="sr-only">Name</label>
        <input type="text" id="inputName" class="form-control top" placeholder="Name" required autofocus>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control middle" placeholder="Email address" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control middle" placeholder="Password" required>
        <label for="inputConfirm" class="sr-only">Confirm Password</label>
        <input type="password" id="inputConfirm" class="form-control bottom" placeholder="Confirm Password" required>
        <div class="checkbox mb-3">
            <a href="{{ url('login') }}">Already a member? Log In</a>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>
@endsection
