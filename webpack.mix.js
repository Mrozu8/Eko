const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/auth.scss', 'public/css')
    .sass('resources/sass/style-js.scss', 'public/css')
    .sass('resources/sass/form.scss', 'public/css');


// mix.copy('resources/assets/sass/img/', 'public/css/images/').version('public/css/images');
// mix.options({ processCssUrls: false });
