const mix = require('laravel-mix');
//mix sass files avoid unncessary js
//mix.js('src/app.js', '/').setPublicPath('dist');

//mix css files
mix.sass('global/styles/scss/main.scss', '/').setPublicPath('global/styles/css');

mix.sass('./adminpanel/globals/styles/scss/adminstyles.scss', '/');


mix.browserSync('http://localhost/portfolio');
