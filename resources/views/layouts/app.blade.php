@prepend('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}" />
@endprepend

@prepend('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endprepend

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Calendar App - @yield('title')</title>
    <meta name="title" content="Calendar App - @yield('title')">
    <meta name="description" content="A simple and modern events calendar.">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Calendar App">
    <meta name="apple-mobile-web-app-title" content="Calendar App">
    <meta name="theme-color" content="#72bcd4">
    <meta name="msapplication-navbutton-color" content="#72bcd4">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @stack('styles')
</head>

<body>
    <div class="loading" id="loader">Loading&#8230;</div>

    @yield('content')

    @stack('scripts')
</body>

</html>