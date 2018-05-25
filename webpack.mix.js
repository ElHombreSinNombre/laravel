const {mix} = require('laravel-mix');

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

//SASS TO CSS
mix.sass('resources/assets/sass/main.scss', 'public/css/partials')
    .sass('resources/assets/sass/puerto.scss', 'public/css/partials')
    .sass('resources/assets/sass/login.scss', 'public/css/partials')
    .sass('resources/assets/sass/dashboard.scss', 'public/css/partials')
    .sass('resources/assets/sass/listado.scss', 'public/css/partials')
    .sass('resources/assets/sass/formulario.scss', 'public/css/partials')
    .sass('resources/assets/sass/select.scss', 'public/css/partials')
    .sass('resources/assets/sass/drop.scss', 'public/css/partials')
    .sass('resources/assets/sass/email.scss', 'resources/views/vendor/mail/html/themes/default')
    .sass('resources/assets/sass/bootstrap/bootstrap.scss', 'public/css').sourceMaps();

//JS
mix.js('resources/assets/js/partials/vue/example.js', 'public/js/partials/vue')
    .js('resources/assets/js/partials/tab.js', 'public/js/partials')
    .js('resources/assets/js/partials/check.js', 'public/js/partials')
    .js('resources/assets/js/partials/main.js', 'public/js/partials')
    .js('resources/assets/js/partials/range.js', 'public/js/partials')
    .js('resources/assets/js/partials/select.js', 'public/js/partials')
    .js('resources/assets/js/partials/timepicker.js', 'public/js/partials')
    .js('resources/assets/js/partials/sweetdelete.js', 'public/js/partials')
    .js('resources/assets/js/partials/choose.js', 'public/js/partials')
    .js('resources/assets/js/partials/custom-datatable-buttons.js', 'public/js/partials')
    .js('resources/assets/js/partials/ajax.js', 'public/js/partials')
    .js('resources/assets/js/partials/textarea.js', 'public/js/partials')
    .js('resources/assets/js/partials/disable.js', 'public/js/partials')
    .js('resources/assets/js/partials/drop.js', 'public/js/partials').sourceMaps();

//COMBINE
/*mix.scripts([
    'public/js/tab.js',
    'public/js/check.js',
    'public/js/main.js',
    'public/js/range.js',
    'public/js/select.js',
    'public/js/timepicker.js',
    'public/js/sweetdelete.js',
    'public/js/drop.js'
    'public/js/ajax.js'
    'public/js/textarea.js'
    'public/js/disable.js'
    'public/js/custom-datatable-buttons.js'
], 'public/js/all.js');

mix.styles([
    'public/css/main.css',
    'public/css/puerto.css',
    'public/css/login.css',
    'public/css/dashboard.css',
    'public/css/listado.css',
    'public/css/formulario.css',
    'public/css/select.css',
    'public/css/drop.css',
], 'public/css/all.css');*/