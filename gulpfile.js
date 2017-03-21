const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');
require('axios');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix
    	.styles([
            '../../../node_modules/sweetalert/dist/sweetalert.css',
            '../../../public/css/metisMenu.min.css',
    	])
        .webpack('app.js')
        .webpack([
            '../../../node_modules/sweetalert/dist/sweetalert.min.js',
            '../../../public/js/metisMenu.min.js',
        ]);
});