$(function () {
    $('[data-toggle="popover"]').popover({
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div><p class="m-0 p-2 border-top"><a href="#" class="edit-event"><i class="mdi mdi-pencil"></i> Edit</a><a href="#" class="float-right delete-event"><i class="mdi mdi-delete"></i> Delete</a></p></div>'
    });
});