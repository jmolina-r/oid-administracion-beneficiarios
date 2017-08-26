const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.webpackConfig({
         module: {
             rules: [
                 {
                     test: /\.css$/,
                     loaders: ['style-loader', 'css-loader']
                 }
             ]
         }
    });

mix.js('resources/assets/js/app.js', 'public/js')
mix.js('resources/assets/js/generals/buscarFuncionario.js', 'public/js')
mix.scripts([
    'resources/assets/vendor/assets/javascripts/jquery/jquery.mobile.custom.min.js',
    'resources/assets/vendor/assets/javascripts/jquery/jquery-ui.min.js',
    'resources/assets/vendor/assets/javascripts/jquery/jquery.ui.touch-punch.min.js',
    'resources/assets/vendor/assets/javascripts/plugins/modernizr/modernizr.min.js',
    'resources/assets/vendor/assets/javascripts/plugins/retina/retina.js',
    'resources/assets/vendor/assets/javascripts/theme.js',
    'resources/assets/vendor/assets/javascripts/plugins/datatables/datatables.min.js',
], 'public/js/all.js')
mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.styles([
    'resources/assets/vendor/assets/stylesheets/light-theme.css',
    'resources/assets/vendor/assets/stylesheets/theme-colors.css',
    'resources/assets/vendor/assets/javascripts/jquery/jquery.mobile.custom.min.js',
    'resources/assets/vendor/assets/images/meta_icons/apple-touch-icon-precomposed.png',
], 'public/css/all.css');
