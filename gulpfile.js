var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

//elixir(function (mix) {
//    mix.sass('app.scss')
//        .publish('vendor/phpunit/php-code-coverage/src/CodeCoverage/Report/HTML/Renderer/Template/js/jquery.min.js',
//        'resources/assets/js/jquery.min.js')
//        .publish('vendor/phpunit/php-code-coverage/src/CodeCoverage/Report/HTML/Renderer/Template/js/bootstrap.min.js',
//        'resources/assets/js/bootstrap.min.js')
//        .scripts([
//            'jquery.min.js',
//            'bootstrap.min.js'
//        ], 'public/js/all.js')
//});

elixir(function (mix) {
    mix.sass('app.scss')
        //.sass('custom.scss')
        .copy('vendor/phpunit/php-code-coverage/src/CodeCoverage/Report/HTML/Renderer/Template/js/jquery.min.js',
        'resources/assets/js/jquery.min.js')
        .copy('vendor/phpunit/php-code-coverage/src/CodeCoverage/Report/HTML/Renderer/Template/js/bootstrap.min.js',
        'resources/assets/js/bootstrap.min.js')
        .scripts([
            'jquery.min.js',
        ], 'public/js/jquery.min.js')
        .scripts([
            'bootstrap.min.js',
        ], 'public/js/bootstrap.min.js');

});

