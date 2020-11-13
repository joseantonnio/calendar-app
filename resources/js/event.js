$(function() {
    var current;

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
});