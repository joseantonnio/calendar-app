<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <a class="navbar-brand" href="#">Calendar App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#addEvent">Add Event</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#jumpCalendar">Jump To</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link user" href="#name"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link logout" href="#logout">Sign Out</a>
            </li>
        </ul>
    </div>
</nav>

@push('scripts')
    <script src="{{ asset('js/nav.js') }}"></script>
@endpush