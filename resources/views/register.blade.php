@extends('layouts/auth')

@section('page', 'Register')

@push('scripts')
    <script src="{{ asset('js/register.js') }}"></script>
@endpush

@section('form', 'formRegister')
@section('message', 'Sign Up')
@section('button', 'Register')

@section('fields')
    <label for="inputName" class="sr-only">Name</label>
    <input type="text" id="inputName" class="form-control top" placeholder="Name" required autofocus>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control middle" placeholder="Email address" required>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control middle" placeholder="Password" required>
    <label for="inputConfirm" class="sr-only">Confirm Password</label>
    <input type="password" id="inputConfirm" class="form-control bottom" placeholder="Confirm Password" required>
@endsection

@section('text')
    <a href="{{ url('login') }}">Already a member? Log In</a>
@endsection
