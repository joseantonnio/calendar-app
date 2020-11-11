$(function () {
    $('#formRegister').on('submit', (e) => {
        e.preventDefault();

        var strongPassword = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

        if ($('#inputName').val().length < 3) {
            toastr.error("Your name need to be at least 3 characters longer.", "Invalid name");
        } else if (!strongPassword.test($('#inputPassword').val())) {
            toastr.error("Your password need at least 1 lowercase, 1 uppercase, 1 numeric character, 1 special character and 8 characters or longer.", "Weak password");
        } else if ($('#inputPassword').val() != $('#inputConfirm').val()) {
            toastr.error("The password confirmation does not match.", "Wrong password");
        } else {
            axios.post('/api/users', {
                name: $('#inputName').val(),
                email: $('#inputEmail').val(),
                password: $('#inputPassword').val(),
                password_confirmation: $('#inputConfirm').val(),
            })
            .then(() => {
                localStorage.setItem('flash', JSON.stringify({
                    type: "success",
                    title: "Success",
                    message: "You have been successfully registered!",
                }));
                window.location.assign("/login");
            })
            .catch(error => {
                requestErrorHandler(error);
            });
        }
    });
});