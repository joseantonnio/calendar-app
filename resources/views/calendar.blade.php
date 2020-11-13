@extends('layouts/app')

@section('title')
    Events
@endsection


@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/calendar.css') }}" />
@endpush


@push('scripts')
    <script src="{{ asset('js/calendar.js') }}"></script>
@endpush


@section('content')
    <x-nav></x-nav>

    <main>
        <div class="container-fluid">
            <header>
                <div class="row">
                    <div class="col-md-8 col-12 text-center order-md-2 mb-3">
                        <h2 class="text-center" id="monthAndYear"></h2>
                    </div>

                    <div class="col-md-2 col-6 text-left p-0 order-md-1 mb-3">
                        <button type="button" class="btn btn-primary" id="previousMonth"><i class="mdi mdi-chevron-left"></i>
                            Previous</button>
                    </div>

                    <div class="col-md-2 col-6 text-right p-0 order-md-3 mb-3">
                        <button type="button" class="btn btn-primary" id="nextMonth">Next <i class="mdi mdi-chevron-right"></i></button>
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
            <div class="row border border-top-0 calendar" id="calendar">
                <!-- -->
            </div>

            @verbatim
                <script id="template-day" type="x-tmpl-mustache">
                    <div class="day col-sm p-2 text-truncate{{#off}} d-none d-sm-inline-block bg-light text-muted{{/off}}{{#active}} active{{/active}}">
                        <h5 class="row align-items-center">
                            <span class="date col-1">{{day}}</span>
                            <small class="col d-sm-none text-center text-muted">{{weekday}}</small>
                            <span class="col-1"></span>
                        </h5>
                        {{{events}}}
                    </div>
                </script>

                <script id="template-event" type="x-tmpl-mustache">
                    <a class="event d-block p-1 pl-2 pr-2 mb-1 small bg-info text-white{{#begin}} event-begin{{/#begin}}{{#mid}} event-middle{{/#mid}}{{#end}} event-end{{/#end}}"
                        title="{{title}}" data-container="body" data-toggle="popover" data-placement="bottom"
                        data-html="true" data-id="1" data-trigger="focus"
                        tabindex="0"
                        data-content="<p>{{content}}</p><p><strong>Begin:</strong> {{begin}}<br><strong>End:</strong> {{end}}</p>">
                        <span class="d-block text-center text-truncate">
                            {{title}}
                        </span>
                    </a>
                </script>
            @endverbatim
        </div>
    </main>

    <x-modal name="addEvent" title="Add new event" button="Save changes">
        <form>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input type="text" class="form-control datepicker" id="inputTitle">
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
                        <label for="inputFrom">Begin</label>
                        <input type="text" class="form-control datetimepicker" id="inputFrom" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="inputTo">End</label>
                        <input type="text" class="form-control datetimepicker" id="inputTo" />
                    </div>
                </div>
            </div>
        </form>
    </x-modal>

    <x-modal name="jumpCalendar" title="Jump to:" button="Go">
        <form>
            <div class="row">
                <div class="col-6">
                    <select class="form-control" id="jumpMonth">
                    </select>
                </div>
                <div class="col-6">
                    <select class="form-control" id="jumpYear">
                    </select>
                </div>
            </div>
        </form>
    </x-modal>
@endsection
