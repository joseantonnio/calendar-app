require('./bootstrap');

import Cookies from 'universal-cookie';
window.cookies = new Cookies();

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