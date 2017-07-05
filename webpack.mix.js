let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.copy('node_modules/dropzone/dist/dropzone.js', 'public/vendor/dropzone/js')
    .copy('node_modules/dropzone/dist/min/dropzone.min.css', 'public/vendor/dropzone/css');

mix.copy('node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput-typeahead.css', 'public/vendor/bootstrap-tagsinput/css')
    .copy('node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css', 'public/vendor/bootstrap-tagsinput/css');

mix.browserSync('http://photogallery.dev');