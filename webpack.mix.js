let mix = require('laravel-mix');

mix.options({
    processCssUrls: false,
})
.js('src/js/main.js', 'assets/js')
.sass('src/sass/main.scss', 'assets/css');
