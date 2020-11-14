$(function () {
    $('#formLogin').on('submit', (e) => {
        e.preventDefault();

        auth.doLogin($('#inputEmail').val(), $('#inputPassword').val());
    });
});