const mix = require('laravel-mix');

mix.disableNotifications();
mix.setPublicPath('public');
mix.js('resources/js/app.js', 'public/js').version();
// mix.copy('resources/data/codes.json', 'public/data');
