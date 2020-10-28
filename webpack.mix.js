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

const tailwindcss = require('tailwindcss');

mix.js('resources/js/admin/app.js', 'public/js/admin.js')
 .sass('resources/sass/admin/app.scss', 'public/css/admin.css')
 .options({
     processCssUrls: false,
     postCss: [tailwindcss('./tailwind.config.js')],
 });

mix.js('resources/js/browser/app.js', 'public/js/browser.js')
 .sass('resources/sass/browser/app.scss', 'public/css/browser.css')
 .options({
     processCssUrls: false,
     postCss: [tailwindcss('./tailwind.config.js')],
 });

//  mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');