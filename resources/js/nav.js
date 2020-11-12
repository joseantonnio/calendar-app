$(function () {
    $('.user').text(auth.user.name);

    $(".logout").on('click', (e) => {
        auth.doLogout();
    });
});