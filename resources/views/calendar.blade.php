@extends('app')

@section('title', 'November 2020')


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
                        <h2 class="text-center">November 2020</h2>
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
            <div class="row border border-right-0 border-bottom-0">
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">
                    <h5 class="row align-items-center">
                        <span class="date col-1">1</span>
                        <small class="col d-sm-none text-center text-muted">Sunday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">2</span>
                        <small class="col d-sm-none text-center text-muted">Monday</small>
                        <span class="col-1"></span>
                    </h5>
                    <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-info text-white"
                        title="Lorem ipsum dolor sit amet consectetur adipiscing elit" data-container="body"
                        data-toggle="popover" data-placement="bottom" data-html="true" data-id="1" data-trigger="focus"
                        tabindex="0"
                        data-content="<p>Integer malesuada eros at lobortis venenatis. Suspendisse ullamcorper nisl in tellus iaculis egestas.</p><p><strong>Begin:</strong> 3:30pm<br><strong>End:</strong> 5:30pm</p>">
                        Lorem ipsum dolor sit amet consectetur adipiscing elit</a>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">3</span>
                        <small class="col d-sm-none text-center text-muted">Tuesday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">4</span>
                        <small class="col d-sm-none text-center text-muted">Wednesday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">5</span>
                        <small class="col d-sm-none text-center text-muted">Thursday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">6</span>
                        <small class="col d-sm-none text-center text-muted">Friday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">7</span>
                        <small class="col d-sm-none text-center text-muted">Saturday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="w-100"></div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">8</span>
                        <small class="col d-sm-none text-center text-muted">Sunday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">9</span>
                        <small class="col d-sm-none text-center text-muted">Monday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">10</span>
                        <small class="col d-sm-none text-center text-muted">Tuesday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">11</span>
                        <small class="col d-sm-none text-center text-muted">Wednesday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">12</span>
                        <small class="col d-sm-none text-center text-muted">Thursday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">13</span>
                        <small class="col d-sm-none text-center text-muted">Friday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">14</span>
                        <small class="col d-sm-none text-center text-muted">Saturday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="w-100"></div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">15</span>
                        <small class="col d-sm-none text-center text-muted">Sunday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">16</span>
                        <small class="col d-sm-none text-center text-muted">Monday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">17</span>
                        <small class="col d-sm-none text-center text-muted">Tuesday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">18</span>
                        <small class="col d-sm-none text-center text-muted">Wednesday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">19</span>
                        <small class="col d-sm-none text-center text-muted">Thursday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">20</span>
                        <small class="col d-sm-none text-center text-muted">Friday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">21</span>
                        <small class="col d-sm-none text-center text-muted">Saturday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="w-100"></div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">22</span>
                        <small class="col d-sm-none text-center text-muted">Sunday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">23</span>
                        <small class="col d-sm-none text-center text-muted">Monday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">24</span>
                        <small class="col d-sm-none text-center text-muted">Tuesday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">25</span>
                        <small class="col d-sm-none text-center text-muted">Wednesday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">26</span>
                        <small class="col d-sm-none text-center text-muted">Thursday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">27</span>
                        <small class="col d-sm-none text-center text-muted">Friday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">28</span>
                        <small class="col d-sm-none text-center text-muted">Saturday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="w-100"></div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">29</span>
                        <small class="col d-sm-none text-center text-muted">Sunday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                    <h5 class="row align-items-center">
                        <span class="date col-1">30</span>
                        <small class="col d-sm-none text-center text-muted">Monday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div
                    class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                    <h5 class="row align-items-center">
                        <span class="date col-1">1</span>
                        <small class="col d-sm-none text-center text-muted">Tuesday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div
                    class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                    <h5 class="row align-items-center">
                        <span class="date col-1">2</span>
                        <small class="col d-sm-none text-center text-muted">Wednesday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div
                    class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                    <h5 class="row align-items-center">
                        <span class="date col-1">3</span>
                        <small class="col d-sm-none text-center text-muted">Thursday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div
                    class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                    <h5 class="row align-items-center">
                        <span class="date col-1">4</span>
                        <small class="col d-sm-none text-center text-muted">Friday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
                <div
                    class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                    <h5 class="row align-items-center">
                        <span class="date col-1">5</span>
                        <small class="col d-sm-none text-center text-muted">Saturday</small>
                        <span class="col-1"></span>
                    </h5>
                    <p class="d-sm-none">No events</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="addEventLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventLabel">Add new event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
