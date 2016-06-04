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

elixir(function (mix) {
    mix.styles([
     'public/css/fromGulp/app.css',
     'public/css/font-awesome.css',
     'public/css/select2.min.css',
     'public/css/sweetalert.css',
     'public/css/subscription.css',
     'public/css/custom.css',
     'public/css/socialMediaFontsFamily.css',
     'public/css/fromGulp/carouselModeToListArticles.css',
     'public/css/searchBar.css',
     'public/css/authPages.css'
     ],'public/css/atulyaperspectives.css','public/css'
     ) .scripts([
     'public/js/jquery.min.js',
     'public/js/jquery-ui.min.js',
     'public/js/bootstrap.min.js',
     'public/js/select2.min.js',
     'public/js/sweetalert.min.js',
     'public/js/customJs/socialIcons.js',
     'public/js/customJs/searchBar.js',
     'public/js/customJs/custom.js',
     'public/js/customJs/subscription.js',
     ],'public/js/atulyaPerspectives.js','public/js'
     ).scripts([
         'public/js/customJs/createNewEditorScript.js',
        ],'public/js/createNewEditorScript.min.js','public/js'
    );
});

