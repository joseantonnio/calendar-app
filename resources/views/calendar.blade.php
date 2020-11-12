@extends('layouts/app')

@section('title', 'Events')


    @push('styles')
        <link type="text/css" rel="stylesheet" href="{{ asset('css/calendar.css') }}" />
    @endpush


    @push('scripts')
        <script src="{{ asset('js/calendar.js') }}"></script>
        <script src="{{ asset('js/event.js') }}"></script>
    @endpush


@section('content')
    <x-nav></x-nav>

    <main>
        <div class="container-fluid">
            <header>
                <div class="row">
                    <div class="col-md-8 col-12 text-center order-md-2 mb-3">
                        <h2 class="text-center">@{{header}}</h2>
                    </div>

                    <div class="col-md-2 col-6 text-left p-0 order-md-1 mb-3">
                        <button type="button" class="btn btn-primary"><i class="mdi mdi-chevron-left"></i>
                            Previous</button>
                    </div>

                    <div class="col-md-2 col-6 text-right p-0 order-md-3 mb-3">
                        <button type="button" class="btn btn-primary">Next <i
                                class="mdi mdi-chevron-right"></i></button>
                    </div>
                </div>
                <div class="row d-none d-sm-flex p-1 bg-primary text-white">
                    <h5 class="col-sm m-0 p-1 text-center">Sunday</h5>
                    <h5 class="col-sm m-0 p-1 text-center">Monday</h5>
                    <h5 class="col-sm m-0 p-1 text-center">Tuesday</h5>
                    <h5 class="col-sm m-0 p-1 text-center">Wednesday</h5>
                    <h5 class="col-sm m-0 p-1 text-center">Thursday</h5>
                    <h5 class="col-sm m-0 p-1 text-center">Friday</h5>
                    <h5 class="col-sm m-0 p-1 text-center">Saturday</h5>
                </div>
            </header>
            <div class="row border border-top-0 calendar">
            </div>
    </main>

    <x-modal name="addEvent" title="Add new event" button="Save changes">
        <form>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="inputDate">Date</label>
                        <input type="text" class="form-control datepicker" id="inputDate">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <textarea class="form-control" id="inputDescription" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="inputFrom">From</label>
                        <input type="text" class="form-control timepicker" id="inputFrom" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="inputTo">To</label>
                        <input type="text" class="form-control timepicker" id="inputTo" disabled />
                    </div>
                </div>
            </div>
        </form>
    </x-modal>
@endsection
