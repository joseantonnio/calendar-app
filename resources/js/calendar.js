import Mustache from 'mustache';
import Event from './classes/event';

$(function () {
    /**
     * Calendar
     */
    var current,
        today = new Date(),
        currentMonth = today.getMonth(),
        currentYear = today.getFullYear(),
        selectYear = $('#jumpYear'),
        selectMonth = $('#jumpMonth'),
        months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        minYear = 2000,
        maxYear = 2099,
        monthAndYear = $('#monthAndYear'),
        dayTemplate = document.getElementById('template').innerHTML;

    /**
     * Calendar Render
     */
    $('.datetimepicker').datetimepicker({
        step: 10,
        minDate: minYear + '/01/01',
        maxDate: maxYear + '/12/31',
        mask: true,
    });

    for (let i = minYear; i <= maxYear; i++) {
        $('#jumpYear').append(new Option(i, i));
    }

    for (let i = 0; i < months.length; i++) {
        $('#jumpMonth').append(new Option(months[i], i));
    }

    render(currentMonth, currentYear);

    /**
     * Calendar Functions
     */
    function render(month, year) {
        // Check year
        if (year < minYear) year = minYear;
        if (year > maxYear) year = maxYear;

        // Date calc
        var date = 1;
        var firstDay = (new Date(year, month)).getDay();
        var daysInMonth = 32 - new Date(year, month, 32).getDate();
        var daysInPrevious = 32 - new Date(year, month - 1, 32).getDate();
        var lastMonthFirst = daysInPrevious - firstDay + 1;

        // Prepare calendar
        var calendar = $('#calendar');
        calendar.html('');
        monthAndYear.text(months[month] + ' ' + year);
        selectYear.val(year);
        selectMonth.val(month);

        // Weeks
        for (let i = 0; i < 6; i++) {
            // Days of the week
            for (let j = 0; j < 7; j++) {
                // Is last month
                if (i === 0 && j < firstDay) {
                    let day = Mustache.render(dayTemplate, {day: lastMonthFirst, off: true});
                    calendar.append(day);
                    lastMonthFirst++;
                // Is next month
                } else if (date > daysInMonth) {
                    let newMonthDate = date % daysInMonth;
                    let day = Mustache.render(dayTemplate, {day: newMonthDate, off: true});
                    calendar.append(day);
                    date++;
                    if (j > 5) i = 6;
                // Is current month
                } else {
                    let active = false;

                    if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                        active = true;
                    }

                    let day = Mustache.render(dayTemplate, {day: date, weekday: days[j], active: active});
                    calendar.append(day);
                    date++;
                }
            }

            // Month ended?
            if (date > daysInMonth) break;

            // Draw line break
            calendar.append('<div class="w-100"></div>');
        }
    }

    /**
     * Calendar event handlers
     */
    $('#nextMonth').on('click', () => {
        currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
        currentMonth = (currentMonth + 1) % 12;

        if (currentYear >= maxYear && currentMonth == 11) {
            $('#nextMonth').prop('disabled', true);
        }

        if (currentYear >= minYear && currentMonth > 0) {
            $('#previousMonth').prop('disabled', false);
        }

        render(currentMonth, currentYear);
    });

    $('#previousMonth').on('click', () => {
        currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
        currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;

        if (currentYear <= minYear && currentMonth == 0) {
            $('#previousMonth').prop('disabled', true);
        }

        if (currentYear <= maxYear && currentMonth < 11) {
            $('#nextMonth').prop('disabled', false);
        }

        render(currentMonth, currentYear);
    });

    $('#jumpCalendarSend').on('click', () => {
        currentYear = parseInt(selectYear.val());
        currentMonth = parseInt(selectMonth.val());
        $('#jumpCalendar').modal('hide');

        if (currentYear <= minYear && currentMonth == 0) {
            $('#previousMonth').prop('disabled', true);
        } else {
            $('#previousMonth').prop('disabled', false);
        }

        if (currentYear >= maxYear && currentMonth == 11) {
            $('#nextMonth').prop('disabled', true);
        } else {
            $('#nextMonth').prop('disabled', false);
        }

        render(currentMonth, currentYear);
    });

    $('#addEventSend').on('click', () => {
        let event = new Event({
            title: $('#inputTitle').val(),
            description: $('#inputDescription').val(),
            begin: $('#inputFrom').val(),
            end: $('#inputTo').val(),
            token: auth.token,
        });

        if (event.title.length < 3) {
            toastr.error('Your event title is too small...');
            $('#inputTitle').addClass('is-invalid');
        } else if (event.description.length < 3) {
            toastr.error('Your event description is too small...');
            $('#inputDescription').addClass('is-invalid');
        } else if (!(event.begin instanceof Date) || isNaN(event.begin)) {
            toastr.error('You have to select a valid begin date!');
            $('#inputFrom').addClass('is-invalid');
        } else if (!(event.end instanceof Date) || isNaN(event.end)) {
            toastr.error('You have to select a valid end date!');
            $('#inputTo').addClass('is-invalid');
        } else if (event.begin > event.end) {
            toastr.error('The begin date should be before then the end date!');
            $('#inputFrom').addClass('is-invalid');
            $('#inputTo').addClass('is-invalid');
        } else {
            event.save();
        }
    });

    /**
     * Events
     */
    $(".event").on('click', (e) => {
        current = $(e.target).data('id');
    });

    $(".event, .event span").on('mouseover', (e) => {
        if ($(e.target).is('span')) {
            var id = $(e.target).parent().data('id');
        } else {
            var id = $(e.target).data('id');
        }
        $('.event').each((i, e) => {
            if ($(e).data('id') == id) {
                $(e).attr('style', 'background-color: #3f9ae5 !important;');
            }
        });
    });

    $(".event, .event span").on('mouseout', (e) => {
        if ($(e.target).is('span')) {
            var id = $(e.target).parent().data('id');
        } else {
            var id = $(e.target).data('id');
        }
        $('.event').each((i, e) => {
            if ($(e).data('id') == id) {
                $(e).attr('style', '');
            }
        });
    });

    $(document).on('click', '.edit-event', () => {
        console.log("Edit event " + current);
        current = null;
    });

    $(document).on('click', '.delete-event', () => {
        console.log("Delete event " + current);
        current = null;
    });

    $('[data-toggle="popover"]').popover({
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div><p class="m-0 p-2 border-top"><a href="#" class="edit-event"><i class="mdi mdi-pencil"></i> Edit</a><a href="#" class="float-right delete-event"><i class="mdi mdi-delete"></i> Delete</a></p></div>'
    });
});