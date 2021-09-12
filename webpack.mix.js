const mix = require('laravel-mix');
const path = require('path')
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
mix.styles([
    'resources/css/app.css',
    'resources/css/bootstrap.css',
    'resources/css/swipercss/swiper-bundle.css',
    'resources/css/owl.carousel.min.css',
    'resources/css/owl.theme.default.min.css',
    'resources/css/chosen.min.css',
    'resources/css/select2.min.css',

], 'public/css/app.css')


// mix.js('resources/js/app.js', 'public/js')

mix.scripts([
    'resources/js/vue.js',
    'resources/js/swiperjs/swiper-bundle.js',
    'resources/js/jquery.js',
    'resources/js/owl.carousel.min.js',
    'resources/js/adminlte.js',
    'resources/js/chosen.jquery.js',
    'resources/js/main.js',
    'resources/js/bootstrap.min.js',
    'resources/js/stand-alone-button.js',
    'resources/js/slide-owl.js',
    'resources/js/select2.min.js',
], 'public/js/app.js')

mix.js('resources/js/app.js', 'public/js').vue().webpackConfig({
    output: {chunkFilename: 'js/[name].[contenthash].js'},
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.runtime.js',
            '@': path.resolve('resource/js'),
        },
    },
})


if (mix.inProduction()) {
    mix.version();
}
