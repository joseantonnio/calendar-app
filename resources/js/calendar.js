import Mustache from 'mustache';
import 'jquery-dateformat/dist/jquery-dateformat';

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
        dayTemplate = $('#template-day').html(),
        eventTemplate = $('#template-event').html(),
        events;

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
        $('#loader').show();

        axios.get(`/api/events/${month+1}/${year}`, {
            headers: {
                'Authorization': 'Bearer ' + auth.token
            }
        })
        .then((response) => {
            events = response.data.events;
            events.map(event => {
                event.begin = new Date(event.begin);
                event.end = new Date(event.end);
            })
            renderCalendar(month, year);
        })
        .catch(response => {
            error(response);
        })
        .then(() => {
            $('#loader').hide();
        });
    }

    function renderEvents(date, month, year) {
        let dayEvents = '',
            fullDate = new Date(year, month, date).setHours(0,0,0,0);

        for (let i = 0; i < events.length; i++) {
            let begin = new Date(events[i].begin).setHours(0,0,0,0),
                end = new Date(events[i].end).setHours(0,0,0,0);
            if (begin == fullDate && end == fullDate) {
                dayEvents += Mustache.render(eventTemplate, {
                    id: events[i].id,
                    title: events[i].title,
                    description: events[i].description,
                    begin: $.format.date(events[i].begin, 'yyyy/MM/dd HH:mm'),
                    end: $.format.date(events[i].end, 'yyyy/MM/dd HH:mm'),
                });
            } else {
                if (begin == fullDate) {
                    dayEvents += Mustache.render(eventTemplate, {
                        class: 'event-begin',
                        id: events[i].id,
                        title: events[i].title,
                        description: events[i].description,
                        begin: $.format.date(events[i].begin, 'yyyy/MM/dd HH:mm'),
                        end: $.format.date(events[i].end, 'yyyy/MM/dd HH:mm'),
                    });
                }
                if (begin < fullDate && end > fullDate) {
                    dayEvents += Mustache.render(eventTemplate, {
                        class: 'event-middle',
                        id: events[i].id,
                        title: events[i].title,
                        description: events[i].description,
                        begin: $.format.date(events[i].begin, 'yyyy/MM/dd HH:mm'),
                        end: $.format.date(events[i].end, 'yyyy/MM/dd HH:mm'),
                    });
                }
                if (end == fullDate) {
                    dayEvents += Mustache.render(eventTemplate, {
                        class: 'event-end',
                        id: events[i].id,
                        title: events[i].title,
                        description: events[i].description,
                        begin: $.format.date(events[i].begin, 'yyyy/MM/dd HH:mm'),
                        end: $.format.date(events[i].end, 'yyyy/MM/dd HH:mm'),
                    });
                }
            }
        }

        if (dayEvents == '') {
            return '<p class="d-sm-none">No events</p>';
        }

        return dayEvents;
    }

    function renderCalendar(month, year) {
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
                    let prevMonth = month - 1,
                    prevMonthYear = year;

                    if (prevMonth < 0) {
                        prevMonth = 11;
                        prevMonthYear = year - 1;
                    }

                    calendar.append(Mustache.render(dayTemplate, {
                        day: lastMonthFirst,
                        off: true,
                        events: renderEvents(lastMonthFirst, prevMonth, prevMonthYear),
                    }));
                    lastMonthFirst++;
                // Is next month
                } else if (date > daysInMonth) {
                    let newMonthDate = date % daysInMonth,
                        nextMonth = month + 1,
                        nextMonthYear = year;

                    if (nextMonth > 11) {
                        nextMonth = 0;
                        nextMonthYear = year + 1;
                    }

                    calendar.append(Mustache.render(dayTemplate, {
                        day: newMonthDate,
                        off: true,
                        events: renderEvents(newMonthDate, nextMonth, nextMonthYear),
                    }));
                    date++;
                    if (j > 5) i = 6;
                // Is current month
                } else {
                    calendar.append(Mustache.render(dayTemplate, {
                        day: date,
                        weekday: days[j],
                        active: date === today.getDate() && year === today.getFullYear() && month === today.getMonth(),
                        events: renderEvents(date, month, year),
                    }));
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
        let event = {
            title: $('#inputTitle').val(),
            description: $('#inputDescription').val(),
            begin: new Date($('#inputFrom').val()),
            end: new Date($('#inputTo').val()),
        };

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
            axios.post('/api/events', event, {
                headers: {
                    'Authorization': 'Bearer ' + auth.token
                }
            })
            .then((response) => {
                success(response);
                $('#addEvent').modal('hide');
                render(currentMonth, currentYear);
            })
            .catch(response => {
                error(response);
            });
        }
    });

    /**
     * Events
     */
    $('body').on('click', ".event", (e) => {
        if ($(e.target).is('span')) {
            current = $(e.target).parent().data('id');
        } else {
            current = $(e.target).data('id');
        }
    });

    $('body').on('mouseover', ".event, .event span", (e) => {
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

    $('body').on('mouseout', ".event, .event span", (e) => {
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

    $('body').on('click', '.edit-event', () => {
        let event = events.filter(function(event) {
            return event.id == current;
        })[0];

        $('#editTitle').val(event.title)
        $('#editDescription').val(event.description)
        $('#editFrom').val($.format.date(event.begin, 'yyyy/MM/dd HH:mm')),
        $('#editTo').val($.format.date(event.end, 'yyyy/MM/dd HH:mm'))

        $('#updateEvent').modal('show');
    });

    $('#updateEventSend').on('click', () => {
        let event = {
            title: $('#editTitle').val(),
            description: $('#editDescription').val(),
            begin: new Date($('#editFrom').val()),
            end: new Date($('#editTo').val()),
        };

        if (event.title.length < 3) {
            toastr.error('Your event title is too small...');
            $('#editTitle').addClass('is-invalid');
        } else if (event.description.length < 3) {
            toastr.error('Your event description is too small...');
            $('#editDescription').addClass('is-invalid');
        } else if (!(event.begin instanceof Date) || isNaN(event.begin)) {
            toastr.error('You have to select a valid begin date!');
            $('#editFrom').addClass('is-invalid');
        } else if (!(event.end instanceof Date) || isNaN(event.end)) {
            toastr.error('You have to select a valid end date!');
            $('#editTo').addClass('is-invalid');
        } else if (event.begin > event.end) {
            toastr.error('The begin date should be before then the end date!');
            $('#editFrom').addClass('is-invalid');
            $('#editTo').addClass('is-invalid');
        } else {
            axios.put(`/api/events/${current}`, event, {
                headers: {
                    'Authorization': 'Bearer ' + auth.token
                }
            })
            .then((response) => {
                success(response);
                $('#updateEvent').modal('hide');
                render(currentMonth, currentYear);
            })
            .catch(response => {
                error(response);
            });

            current = null;
        }
    });

    $('body').on('click', '.delete-event', () => {
        $('#deleteEvent').modal('show');
    });

    $('#deleteEventSend').on('click', () => {
        axios.delete(`/api/events/${current}`, {
            headers: {
                'Authorization': 'Bearer ' + auth.token
            }
        })
        .then((response) => {
            success(response);
            render(currentMonth, currentYear);
        })
        .catch(response => {
            error(response);
        });

        $('#deleteEvent').modal('hide');
        current = null;
    });

    var popOverSettings = {
        placement: 'bottom',
        container: 'body',
        html: true,
        trigger: 'focus',
        selector: '[data-toggle="popover"]',
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div><p class="m-0 p-2 border-top"><a href="#" class="edit-event"><i class="mdi mdi-pencil"></i> Edit</a><a href="#" class="float-right delete-event"><i class="mdi mdi-delete"></i> Delete</a></p></div>',
        content: function () {
            return $('#popover-content').html();
        }
    }

    $('body').popover(popOverSettings);

});