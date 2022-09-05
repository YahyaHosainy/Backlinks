const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

mix.js('resources/js/CannibalizationFetcher.js', 'public/js/CannibalizationFetcher.js');

mix.js('resources/js/canvas-ui/app.js', 'public/js/canvas-ui.js').sass(
    'resources/sass/canvas-ui.scss',
    'public/css/canvas-ui.css'
);

//minify desktop style
mix.styles([
    'public/assets/css/style.css'

], 'public/assets/css/style.min.css');
//minify mobile style
mix.styles([
    'public/assets/css/responsive.css'
], 'public/assets/css/responsive.min.css');
//minify flaticon style
mix.styles([
    'public/assets/css/flaticon.css'
], 'public/assets/css/flaticon.min.css');
//minify flaticon style
mix.styles([
    'public/assets/css/meanmenu.css'
], 'public/assets/css/meanmenu.min.css');
//minify flaticon style
mix.styles([
    'public/assets/css/font-dancing.css'
], 'public/assets/css/font-dancing.min.css');

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            '@': __dirname + '/public/assets'
        }
    }

});