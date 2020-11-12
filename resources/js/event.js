$(function() {
    var current;

    $(".event").on('click', (e) => {
        current = $(e.target).data('id');
    });

    $('.datepicker').datepicker({
        'format': 'm/d/yyyy',
        'autoclose': true
    });

    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 10,
        minTime: '12:00 am',
        maxTime: '23:50 pm',
        dropdown: true,
        scrollbar: true,
        zindex: 1100,
        change: function (time) {
            var element = $(this), text;
            var timepicker = element.timepicker();

            if ($(this)[0].id == 'inputFrom') {
                $('#inputTo').prop("disabled", false);
                $('#inputTo').timepicker("option", "minTime", new Date(time.getTime() + 10 * 60000));
            }
        },
    });

    $(document).on('click', '.edit-event', () => {
        console.log("Edit event " + current);
        current = null;
    });

    $(document).on('click', '.delete-event', () => {
        console.log("Delete event " + current);
        current = null;
    });
});