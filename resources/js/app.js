require('./bootstrap');

import 'jquery-datetimepicker';

import Auth from './classes/auth';
window.auth = new Auth();

window.setFlash = (message, title = null, type = "info") => {
    localStorage.setItem('flash', JSON.stringify({
        type: type,
        title: title,
        message: message,
    }));
}

window.error = (request) => {
    if (request.response != undefined) {
        if (request.response.data['message'] != undefined) {
            toastr.error(request.response.data['message'], "Something went wrong");
        } else {
            toastr.error(request.response.data[Object.keys(request.response.data)[0]][0], "Something went wrong");
        }
    } else {
        toastr.error("Something went wrong...", "Ooops!");
        console.error(request);
    }
}

window.success = (request) => {
    if (request.data != undefined) {
        if (request.data['message'] != undefined) {
            toastr.success(request.data['message'], "Success");
        }
    } else {
        toastr.success("Action completed successfully!", "Success");
        console.log(request);
    }
}

$(function () {
    $('input, textarea, select').on('focus', (e) => {
        $(e.target).removeClass('is-invalid');
    });

    if (localStorage.getItem('flash')) {
        var flash = JSON.parse(localStorage.getItem('flash'));
        console.log(localStorage.getItem('flash'));
        switch (flash.type) {
            case 'success':
                toastr.success(flash.message, flash.title);
                break;
            case 'info':
                toastr.info(flash.message, flash.title);
                break;
            case 'warning':
                toastr.warn(flash.message, flash.title);
                break;
            case 'error':
                toastr.error(flash.message, flash.title);
                break;
            default:
                break;
        }
        localStorage.removeItem('flash');
    }
});