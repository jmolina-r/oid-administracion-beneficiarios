<!DOCTYPE html>
<html>
    <head>
        <html lang="{{ config('app.locale') }}">
        <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="csrf-token" content="{{ csrf_token() }}">


        @yield('styles_before')

        <link href="{{ asset('/assets/stylesheets/bootstrap/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
        <!-- / theme file [required] -->
        <link href="{{ asset('/assets/stylesheets/light-theme.css') }}" rel="stylesheet" type="text/css" media="all" id="color-settings-body-color" />
        <!-- / coloring file [optional] (if you are going to use custom contrast color) -->
        <link href="{{ asset('/assets/stylesheets/theme-colors.css') }}" rel="stylesheet" type="text/css" media="all" />


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
        {{-- <script type="text/javascript" src="{{ asset('/js/general.js') }}"></script> --}}
    </body>
</html>
