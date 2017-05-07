<!DOCTYPE html>
<html>
    <head>
        <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <!-- / jquery [required] -->
        <script src="assets/javascripts/jquery/jquery.min.js" type="text/javascript"></script>
        <!-- / jquery mobile (for touch events) -->
        <script src="assets/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
        <!-- / jquery ui -->
        <script src="assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
        <!-- / jQuery UI Touch Punch -->
        <script src="assets/javascripts/jquery/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
        <!-- / bootstrap [required] -->
        <script src="assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>
        <!-- / modernizr -->
        <script src="assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
        <!-- / retina -->
        <script src="assets/javascripts/plugins/retina/retina.js" type="text/javascript"></script>
        <!-- / theme file [required] -->
        <script src="assets/javascripts/theme.js" type="text/javascript"></script>

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
