require('./bootstrap');

import Cookies from 'universal-cookie';
window.cookies = new Cookies();

window.requestErrorHandler = (error) => {
    if (error.response != undefined) {
        toastr.error(error.response.data[Object.keys(error.response.data)[0]][0], "Something went wrong");
    } else {
        toastr.error("Something went wrong...", "Ooops!");
        console.error(error);
    }
}

$(function () {
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