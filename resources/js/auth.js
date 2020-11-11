var protected_routes = [
    '/'
];

if (cookies.get('calendar_app_access_token') == undefined && protected_routes.includes(window.location.pathname)) {
    document.body.innerHTML = "";
    window.location.assign("/login");
}