$(function () {
    $('#formLogin').on('submit', (e) => {
        e.preventDefault();

        axios.post('/api/auth/login', {
            email: $('#inputEmail').val(),
            password: $('#inputPassword').val(),
        })
            .then(response => {
                var expires_in = new Date();
                expires_in.setSeconds(expires_in.getSeconds() + response.data.expires_in);

                cookies.set('calendar_app_access_token', response.data.access_token, {
                    path: '/',
                    expires: expires_in,
                    sameSite: 'lax',
                });

                cookies.set('calendar_app_user', response.data.user, {
                    path: '/',
                    expires: expires_in,
                    sameSite: 'lax',
                });

                window.location.assign("/");
            })
            .catch(error => {
                requestErrorHandler(error);
            });
    });
});