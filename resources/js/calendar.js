$(function () {
    var current;
    var user = cookies.get('calendar_app_user')[0];

    console.log(user);

    $('.user').text(user.name);

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

            console.log(timepicker);

            if ($(this)[0].id == 'inputFrom') {
                $('#inputTo').prop("disabled", false);
                $('#inputTo').timepicker("option", "minTime", new Date(time.getTime() + 10 * 60000));
            }
        },
    });

    $('[data-toggle="popover"]').popover({
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div><p class="m-0 p-2 border-top"><a href="#" class="edit-event"><i class="mdi mdi-pencil"></i> Edit</a><a href="#" class="float-right delete-event"><i class="mdi mdi-delete"></i> Delete</a></p></div>'
    });

    $(".event").on('click', (e) => {
        current = $(e.target).data('id');
    });

    $(".logout").on('click', (e) => {
        axios.delete('/api/auth/logout', {
            headers: {
                'Authorization': 'Bearer ' + cookies.get('calendar_app_access_token')
            }
        })
            .then(response => {
                cookies.remove('calendar_app_access_token');
                cookies.remove('calendar_app_user');
                window.location.assign("/login");
            })
            .catch(error => {
                requestErrorHandler(error);
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
});