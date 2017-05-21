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

mix
  .styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css',
    'node_modules/sweetalert/dist/sweetalert.css',
    'node_modules/metismenu/dist/metisMenu.css',
    'node_modules/font-awesome/css/font-awesome.css',
  ], 'public/css/all.css')
  .copy('node_modules/font-awesome/fonts', 'public/fonts')
  .copy('node_modules/bootstrap/dist/fonts', 'public/fonts')
  .js('resources/assets/js/app.js', 'public/js')
  ;
