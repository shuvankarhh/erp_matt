let mix = require('laravel-mix');

// Bootstrap JavaScript
mix.js('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/js/bootstrap').version();

// Bootstrap CSS
mix.css('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap').version();

// Your custom JavaScript and SCSS files
mix.js('resources/js/app.js', 'public/js').version();
mix.sass('resources/sass/app.scss', 'public/css').version();
