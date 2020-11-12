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
        monthAndYear = $('#monthAndYear');

    render(currentMonth, currentYear);

    /**
     * Functions
     */
    function createDay(date, weekday, off = false) {
        let day = document.createElement('div');

        if (off) {
            day.className = 'day col-sm p-2 text-truncate d-none d-sm-inline-block bg-light text-muted';
        } else {
            day.className = 'day col-sm p-2 text-truncate';
        }

        let dayContent = document.createElement('h5');
        dayContent.className = 'row align-items-center';

        let dayNumber = document.createElement('span');
        dayNumber.className = 'date col-1';
        dayNumber.appendChild(document.createTextNode(date));
        dayContent.appendChild(dayNumber);

        let dayText = document.createElement('small');
        dayText.className = 'col d-sm-none text-center text-muted';
        dayText.appendChild(document.createTextNode(weekday));
        dayContent.appendChild(dayText);

        let daySpacing = document.createElement('span');
        daySpacing.className = 'col-1';
        dayContent.appendChild(daySpacing);

        let events = document.createElement('p');
        events.className = 'd-sm-none text-center';
        events.appendChild(document.createTextNode('No events'));

        day.appendChild(dayContent);
        day.appendChild(events);
        return day;
    }

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
                    let day = createDay(lastMonthFirst, '', true);
                    calendar.append(day);
                    lastMonthFirst++;
                // Is next month
                } else if (date > daysInMonth) {
                    let newMonthDate = date % daysInMonth;
                    let day = createDay(newMonthDate, days[j], true);
                    calendar.append(day);
                    date++;
                    if (j > 5) i = 6;
                // Is current month
                } else {
                    let day = createDay(date, days[j]);

                    if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                        day.classList.add('active');
                    }

                    calendar.append(day);
                    date++;
                }
            }

            // Draw line break
            let row = document.createElement('div');
            row.classList.add('w-100');
            calendar.append(row);

            // Month ended?
            if (date > daysInMonth) break;
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
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div><p class="m-0 p-2 border-top"><a href="#" class="edit-event"><i class="mdi mdi-pencil"></i> Edit</a><a href="#" class="float-right devare-event"><i class="mdi mdi-devare"></i> Devare</a></p></div>'
    });
});