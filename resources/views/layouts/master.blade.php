<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        @yield('styles')
    </head>
    <body @yield('body-attr')>
        @yield('content')
    </body>
</html>
