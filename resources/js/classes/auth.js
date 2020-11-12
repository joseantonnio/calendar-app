export default class Auth {
    constructor() {
        this.protected_routes = [
            '/'
        ];

        if (cookies.get('calendar_app_access_token') == undefined && this.protected_routes.includes(window.location.pathname)) {
            document.body.innerHTML = "";
            window.location.assign("/login");
        }
    }

    doLogin(email, password) {
        axios.post('/api/auth/login', {
            email: email,
            password: password,
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
        .catch(response => {
            this.error(response);
        });
    }

    doLogout() {
        axios.delete('/api/auth/logout', {
            headers: {
                'Authorization': 'Bearer ' + cookies.get('calendar_app_access_token')
            }
        })
        .then(() => {
            cookies.remove('calendar_app_access_token');
            cookies.remove('calendar_app_user');
            window.location.assign("/login");
        })
        .catch(response => {
            this.error(response);
        });
    }

    doRegister(name, email, password, password_confirmation) {
        return axios.post('/api/users', {
            name: name,
            email: email,
            password: password,
            password_confirmation: password_confirmation,
        })
        .then(() => {
            return true;
        })
        .catch(response => {
            this.error(response);
            return false;
        });
    }

    error(request) {
        if (request.response != undefined) {
            toastr.error(request.response.data[Object.keys(request.response.data)[0]][0], "Something went wrong");
        } else {
            toastr.error("Something went wrong...", "Ooops!");
            console.error(request);
        }
    }

    get user() {
        return cookies.get('calendar_app_user');
    }
}