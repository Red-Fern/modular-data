const mix = require('laravel-mix');

mix 
    .setPublicPath('assets')

    .postCss('resources/css/main.css', 'assets/css', [
        require('tailwindcss')
    ])

    .js('resources/js/main.js', './assets/js')

    .copyDirectory('resources/images', 'assets/images')

    .options({
        processCssUrls: false
    })