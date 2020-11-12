@extends('layouts/app')

@section('title')
    Events
@endsection


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

            <script id="template" type="x-tmpl-mustache">
                <div class="day col-sm p-2 text-truncate @{{#off}} d-none d-sm-inline-block bg-light text-muted @{{/off}} @{{#active}} active @{{/active}}">
                    <h5 class="row align-items-center">
                        <span class="date col-1">@{{ day }}</span>
                        <small class="col d-sm-none text-center text-muted">@{{ weekday }}</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
            </script>
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

    <x-modal name="jumpCalendar" title="Jump to:" button="Go">
        <form>
            <div class="row">
                <div class="col-6">
                    <select class="form-control" id="jumpMonth">
                        <option value=0>January</option>
                        <option value=1>February</option>
                        <option value=2>March</option>
                        <option value=3>April</option>
                        <option value=4>May</option>
                        <option value=5>June</option>
                        <option value=6>July</option>
                        <option value=7>August</option>
                        <option value=8>September</option>
                        <option value=9>October</option>
                        <option value=10>November</option>
                        <option value=11>December</option>
                    </select>
                </div>
                <div class="col-6">
                    <select class="form-control" id="jumpYear">
                        <option value=1990>1990</option>
                        <option value=1991>1991</option>
                        <option value=1992>1992</option>
                        <option value=1993>1993</option>
                        <option value=1994>1994</option>
                        <option value=1995>1995</option>
                        <option value=1996>1996</option>
                        <option value=1997>1997</option>
                        <option value=1998>1998</option>
                        <option value=1999>1999</option>
                        <option value=2000>2000</option>
                        <option value=2001>2001</option>
                        <option value=2002>2002</option>
                        <option value=2003>2003</option>
                        <option value=2004>2004</option>
                        <option value=2005>2005</option>
                        <option value=2006>2006</option>
                        <option value=2007>2007</option>
                        <option value=2008>2008</option>
                        <option value=2009>2009</option>
                        <option value=2010>2010</option>
                        <option value=2011>2011</option>
                        <option value=2012>2012</option>
                        <option value=2013>2013</option>
                        <option value=2014>2014</option>
                        <option value=2015>2015</option>
                        <option value=2016>2016</option>
                        <option value=2017>2017</option>
                        <option value=2018>2018</option>
                        <option value=2019>2019</option>
                        <option value=2020>2020</option>
                        <option value=2021>2021</option>
                        <option value=2022>2022</option>
                        <option value=2023>2023</option>
                        <option value=2024>2024</option>
                        <option value=2025>2025</option>
                        <option value=2026>2026</option>
                        <option value=2027>2027</option>
                        <option value=2028>2028</option>
                        <option value=2029>2029</option>
                        <option value=2030>2030</option>
                    </select>
                </div>
            </div>
        </form>
    </x-modal>
@endsection
