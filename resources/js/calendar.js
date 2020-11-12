import Mustache from 'mustache';

$(function () {
    /**
     * Calendar
     */
    var today = new Date(),
        currentMonth = today.getMonth(),
        currentYear = today.getFullYear(),
        selectYear = $('#jumpYear'),
        selectMonth = $('#jumpMonth'),
        months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        monthAndYear = $('#monthAndYear'),
        dayTemplate = document.getElementById('template').innerHTML;

    render(currentMonth, currentYear);

    /**
     * Functions
     */
    function render(month, year) {
        // Date Calc
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
            // Days
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
     * Events
     */

    $('#nextMonth').on('click', () => {
        currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
        currentMonth = (currentMonth + 1) % 12;
        render(currentMonth, currentYear);
    });

    $('#previousMonth').on('click', () => {
        currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
        currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
        render(currentMonth, currentYear);
    });

    $('#jumpCalendarSend').on('click', () => {
        currentYear = parseInt(selectYear.val());
        currentMonth = parseInt(selectMonth.val());
        $('#jumpCalendar').modal('hide');
        render(currentMonth, currentYear);
    });

    $('[data-toggle="popover"]').popover({
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div><p class="m-0 p-2 border-top"><a href="#" class="edit-event"><i class="mdi mdi-pencil"></i> Edit</a><a href="#" class="float-right delete-event"><i class="mdi mdi-delete"></i> Delete</a></p></div>'
    });
});