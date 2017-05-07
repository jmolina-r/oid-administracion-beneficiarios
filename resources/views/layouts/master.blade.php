<!DOCTYPE html>
<html>
    <head>
        <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <!-- meta tributo title -->
        <title>@yield('title')</title>

        <!-- Estilos de la vista -->
        @yield('styles')
    </head>
    <body @yield('body-attr')>
        <!-- Este yield tiene relacion al contenido de la pagina -->
        @yield('content')

        <!-- Con este yield se inyectan los scripts -->
        @yield('scripts')
    </body>
</html>
